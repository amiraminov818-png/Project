<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пост</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Новый пост</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        {{-- Заголовок --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Заголовок</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full px-3 py-2 border rounded-lg @error('title') border-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Контент --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Содержание</label>
            <textarea name="content" rows="5"
                      class="w-full px-3 py-2 border rounded-lg @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Временный выбор автора (пока нет авторизации) --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Автор (ID)</label>
            <input type="number" name="user_id" value="{{ old('user_id') }}"
                   class="w-full px-3 py-2 border rounded-lg @error('user_id') border-red-500 @enderror">
            @error('user_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                Опубликовать
            </button>
            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">Отмена</a>
        </div>
    </form>
</div>
</body>
</html>
