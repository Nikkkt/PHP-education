<?php

namespace App\Http\Controllers\Api;

use App\Events\PostPublished;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        // TODO: виправити те, що автор пустий :)
        $posts = Post::with('tags', 'author')
            ->withCount('comments', 'likes')
            ->latest()
            ->paginate(10);
        return response()->json(PostResource::collection($posts));
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $post = Post::create($request->except('tags'));

        if ($request->has('tags')) {
            $post->tags()->attach($request->input('tags'));
        }

        // Відправляємо нотифікацію всім користувачам
        $users = User::query()->limit(2)->get();
        foreach ($users as $user) {
            $user->notify(new NewPostNotification($post));
        }

        return response()->json(new PostResource($post->load('tags')), 201);
    }

    public function show(Post $post): JsonResponse
    {
        // TODO: виправити те, що автор пустий :)
        $resource = $post->load('tags', 'author')->loadCount(['comments', 'likes']);
        return response()->json(new PostResource($resource), 200);
    }

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post->update($request->except('tags'));

        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        return response()->json(new PostResource($post->load('tags')), 200);
    }

    public function publish(Request $request, Post $post): JsonResponse
    {
        $post->update([
            'is_publish' => true
        ]);

        //PostPublished::dispatch($post, "insider.smidt@gmail.com");
        event(new PostPublished($post, "insider.smidt@gmail.com"));

        return response()->json(new PostResource($post->load('tags')), 200);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->tags()->detach();
        $post->delete();

        return response()->json(null, 204);
    }
}
