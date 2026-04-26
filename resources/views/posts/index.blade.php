<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список постов</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4">

<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-6">
        <h1 class="text-2xl font-black text-slate-800 tracking-tight">Лента постов</h1>
        <a href="{{ route('posts.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-5 rounded-lg transition">
            + Написать
        </a>
    </div>

    <div class="space-y-4">
        @forelse($posts as $post)
            <div class="bg-white border border-slate-200 p-5 rounded-xl hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold">
                        {{ substr($post->user->name ?? '?', 0, 1) }}
                    </div>
                    <span class="text-sm font-bold text-slate-700">{{ $post->user->name ?? 'Автор удален' }}</span>
                    <span class="text-xs text-slate-400">• {{ $post->created_at->diffForHumans() }}</span>
                </div>

                <h2 class="text-lg font-bold text-slate-900 leading-snug">
                    {{ $post->title }}
                </h2>

                <div class="mt-4 flex items-center justify-between">
                    <span class="text-[10px] font-mono text-slate-300 uppercase tracking-widest">ID: {{ $post->id }}</span>
                    <a href="#" class="text-indigo-600 text-xs font-bold uppercase tracking-wider hover:text-indigo-800 transition">
                        Подробнее →
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl p-10 text-center border-2 border-dashed border-slate-200">
                <p class="text-slate-400 italic font-medium">Пока здесь ничего не опубликовано...</p>
            </div>
        @endforelse
    </div>

    {{-- Пагинация --}}
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>

</body>
</html>
