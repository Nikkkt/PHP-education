<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>
    @auth
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Post</a>
    @endauth
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="border p-4 mb-4 rounded">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <p class="text-gray-600">Posted by {{ $post->user->name }}</p>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach
</div>
</body>
</html>
