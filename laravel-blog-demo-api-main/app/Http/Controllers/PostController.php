<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Post::query()->with(['author', 'tags'])->withCount(['comments', 'tags']);

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('published')) {
            $query->where('is_publish', $request->query('published') === '1');
        }

        if ($author = $request->query('author')) {
            $query->where('user_id', $author);
        }

        if ($sort = $request->query('sort')) {
            $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
            $column = ltrim($sort, '-');
            if (in_array($column, ['title', 'created_at'])) {
                $query->orderBy($column, $direction);
            }
        }

        $posts = $query->paginate(10);

        return response()->json([
            'data' => PostResource::collection($posts->items()),
            'links' => [
                'first' => $posts->url(1),
                'last' => $posts->url($posts->lastPage()),
                'prev' => $posts->previousPageUrl(),
                'next' => $posts->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $posts->currentPage(),
                'from' => $posts->firstItem(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'to' => $posts->lastItem(),
                'total' => $posts->total(),
            ],
        ]);
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $post = Post::create([
            'user_id' => $validated['user_id'],
            'slug' => $validated['slug'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'is_publish' => $validated['is_publish'] ?? false,
            'image' => $validated['image'] ?? null,
        ]);

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        $post->load(['author', 'tags']);
        $post->loadCount(['comments', 'tags']);

        return response()->json(new PostResource($post), 201);
    }

    public function show(string $id): JsonResponse
    {
        $post = Post::with(['author', 'tags'])
            ->withCount(['comments', 'tags'])
            ->findOrFail($id);

        return response()->json(new PostResource($post));
    }

    public function update(UpdatePostRequest $request, string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();

        $post->update(array_filter([
            'user_id' => $validated['user_id'] ?? $post->user_id,
            'slug' => $validated['slug'] ?? $post->slug,
            'title' => $validated['title'] ?? $post->title,
            'content' => $validated['content'] ?? $post->content,
            'is_publish' => $validated['is_publish'] ?? $post->is_publish,
            'image' => $validated['image'] ?? $post->image,
        ]));

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        $post->load(['author', 'tags']);
        $post->loadCount(['comments', 'tags']);

        return response()->json(new PostResource($post));
    }

    public function destroy(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}
