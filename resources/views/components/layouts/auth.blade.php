<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen antialiased bg-white dark:bg-gradient-to-b dark:from-gray-950 dark:to-gray-900">
        <div class="flex min-h-svh flex-col items-center justify-center gap-6 bg-background p-6 md:p-10">
            <div class="w-full max-w-sm flex flex-col gap-2">
                <a
                    href="{{ route('home') }}"
                    class="flex flex-col items-center gap-2 font-medium"
                >
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-10 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>