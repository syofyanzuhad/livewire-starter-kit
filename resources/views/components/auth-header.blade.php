@props(['title', 'description'])

<div class="text-center w-full gap-2 flex flex-col">
    <h1 class="text-xl font-bold dark:text-zinc-200">{{ $title }}</h1>
    <p class="text-center text-sm dark:text-zinc-400">{{ $description }}</p>
</div>
