<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\NewPostNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        $users = User::where('notification_allowed', true)->get();
        Notification::send($users, new NewPostNotification($post));

        return redirect()->route('posts.create')->with('success', 'Post created and notifications sent!');
    }
}
