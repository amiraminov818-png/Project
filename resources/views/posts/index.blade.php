<!DOCTYPE html>
<html class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои Посты</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="h-full text-white">

<div class="min-h-full">
    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/posts" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Все посты</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Категории</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">Лента публикаций</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($posts as $post)
                    <div class="flex flex-col overflow-hidden rounded-lg bg-gray-800 border border-white/10 shadow-lg transition hover:border-indigo-500/50">
                        <div class="p-6">
                            <div class="flex items-center gap-x-3 mb-4">
                <span class="inline-flex items-center rounded-md bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30">
                  ID: {{ $post->id }}
                </span>
                                <span class="text-sm text-gray-400">{{ $post->created_at->format('d.m.Y') }}</span>
                            </div>

                            <h2 class="text-xl font-semibold text-white mb-2 leading-7">
                                {{ $post->title }}
                            </h2>

                            <p class="text-gray-400 text-sm line-clamp-3 mb-4">
                                {{ $post->content }}
                            </p>
                        </div>

                        <div class="mt-auto border-t border-white/5 bg-white/5 px-6 py-4 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-xs font-bold uppercase">
                                    {{ substr($post->user->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-gray-300">{{ $post->user->name }}</span>
                            </div>

                            <a href="#" class="text-sm font-semibold text-indigo-400 hover:text-indigo-300">Читать →</a>
                        </div>
                    </div>
                @endforeach

            </div>

            @if($posts->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-400">Постов пока нет. Запустите сидеры!</p>
                </div>
            @endif

        </div>
    </main>
</div>

</body>
</html>
