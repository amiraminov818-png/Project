<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать новый пост</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 py-10">

<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
    <div class="bg-indigo-600 px-6 py-4">
        <h1 class="text-white text-xl font-bold">Новая публикация</h1>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" class="p-6">
        @csrf

        <div class="mb-5">
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Заголовок</label>
            <input type="text"
                   name="title"
                   id="title"
                   value="{{ old('title') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('title') border-red-500 @else border-gray-300 @enderror"
                   placeholder="Введите название поста">

            @error('title')
            <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">Автор публикации</label>
            <select name="user_id"
                    id="user_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <p class="text-gray-400 text-xs mt-1 italic italic">Выберите пользователя, от лица которого будет опубликован пост</p>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Текст поста</label>
            <textarea name="content"
                      id="content"
                      rows="6"
                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('content') border-red-500 @else border-gray-300 @enderror"
                      placeholder="О чем хотите рассказать?">{{ old('content') }}</textarea>

            @error('content')
            <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Отмена</a>
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200 shadow-md">
                Опубликовать пост
            </button>
        </div>
    </form>
</div>

</body>
</html>
