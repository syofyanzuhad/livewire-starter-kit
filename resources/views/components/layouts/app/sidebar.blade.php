<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="flex space-x-2 items-center mr-5">
                <x-app-logo class="size-8" href="#"></x-app-logo>
            </a>
    
    
            <flux:navlist variant="outline">
                <flux:navlist.group heading="Platform" class="hidden lg:grid">
                    <flux:navlist.item icon="home" href="#" current>Dashboard</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
    
            <flux:spacer />
    
            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">Repository</flux:navlist.item>
                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">Documentation</flux:navlist.item>
            </flux:navlist>
    
            <flux:dropdown position="bottom" align="start">
                <x-profile-avatar-dropdown initials="{{ auth()->user()->initials() }}" icon-trailing="chevrons-up-down" name="{{ auth()->user()->name }}">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm"><span class="relative flex shrink-0 h-8 w-8 overflow-hidden rounded-lg"><span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">{{ auth()->user()->initials() }}</span></span></div>
                </x-profile-avatar-dropdown>
    
                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="text-sm p-0 font-normal"><div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm"><span class="relative flex shrink-0 h-8 w-8 overflow-hidden rounded-lg"><span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">{{ auth()->user()->initials() }}</span></span><div class="grid flex-1 text-left text-sm leading-tight"><span class="truncate font-semibold">{{ auth()->user()->name }}</span><span class="truncate text-xs">{{ auth()->user()->email }}</span></div></div></div>
                    </flux:menu.radio.group>
                    <flux:menu.separator />
                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog">Settings</flux:menu.item>
                    </flux:menu.radio.group>
    
                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>


            {{-- <flux:dropdown position="top" align="start" class="max-lg:hidden">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" name="Olivia Martin" />
    
                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>
    
                    <flux:menu.separator />
    
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown> --}}
        </flux:sidebar>
    
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    
            <flux:spacer />
    
            <flux:dropdown position="top" alignt="start">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
    
                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>
    
                    <flux:menu.separator />
    
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>
    
        {{ $slot}}
    
        @fluxScripts
    </body>
</html>
