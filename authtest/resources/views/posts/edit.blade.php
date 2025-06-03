<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="border rounded w-full p-2" required>
            @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="body" class="block text-sm font-medium">Body</label>
            <textarea name="body" id="body" class="border rounded w-full p-2" required>{{ $post->body }}</textarea>
            @error('body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
</body>
</html>
