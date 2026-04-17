<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">

    <div class="px-8 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
        <a href="{{ route('posts.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center transition">
            ← Назад к списку
        </a>

        <div class="flex space-x-3">
            <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-yellow-900 px-4 py-2 rounded-lg text-sm font-bold transition">
                Редактировать
            </a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                    Удалить
                </button>
            </form>
        </div>
    </div>

    <article class="p-8">
        <h1 class="text-4xl font-black text-gray-900 mb-6 leading-tight">
            {{ $post->title }}
        </h1>

        <div class="flex items-center space-x-4 mb-8 text-sm text-gray-500 border-b border-gray-100 pb-6">
            <div class="flex items-center">
                    <span class="font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">
                        Автор: {{ $post->user->name }}
                    </span>
            </div>
            <div class="flex items-center">
                <span>Дата: {{ $post->created_at->format('d.m.Y в H:i') }}</span>
            </div>
        </div>

        <div class="text-gray-800 leading-relaxed text-xl whitespace-pre-line">
            {{ $post->content }}
        </div>
    </article>

    <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 italic text-gray-400 text-sm">
        ID публикации: #{{ $post->id }} | Последнее обновление: {{ $post->updated_at->diffForHumans() }}
    </div>
</div>

</body>
</html>
