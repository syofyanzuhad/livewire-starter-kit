<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen antialiased bg-white dark:bg-gradient-to-b dark:from-gray-950 dark:to-gray-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="relative hidden h-full flex-col bg-muted p-10 text-white dark:border-r lg:flex">
                <div class="absolute inset-0 bg-zinc-900"></div>
                <a
                    href="{{ route('home') }}"
                    class="relative z-20 flex items-center text-lg font-medium"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-app-logo-icon class="mr-2 h-6 fill-current text-white" />
                    </span>
                    {{ config('app.name', 'Laravel') }}
                </a>

                @php
                    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                @endphp

                <div class="relative z-20 mt-auto">
                    <blockquote class="space-y-2">
                        <p class="text-lg">&ldquo;{{ trim($message) }}&rdquo;</p>
                        <footer class="text-sm">{{ trim($author) }}</footer>
                    </blockquote>
                </div>
            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a
                        href="{{ route('home') }}"
                        class="flex flex-col items-center gap-2 font-medium z-20 lg:hidden"
                    >
                        <span class="flex h-10 w-10 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-10 fill-current text-black dark:text-white" />
                        </span>
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>



