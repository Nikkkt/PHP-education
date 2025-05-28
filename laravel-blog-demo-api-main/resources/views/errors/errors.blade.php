<!DOCTYPE html>
<html>
<head>
    <title>Validation Error</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Validation Error</h2>
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
    <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Go Back</a>
</div>
</body>
</html>
