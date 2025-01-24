<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    
            <a href="{{ route('dashboard') }}" class="flex space-x-2 items-center mr-5">
                <x-app-logo class="size-8" href="#"></x-app-logo>
            </a>
            
    
            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item icon="layout-grid" href="{{ route('dashboard') }}" current>Dashboard</flux:navbar.item>
            </flux:navbar>
    
            <flux:spacer />
    
            <flux:navbar class="mr-4">
                <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
                <flux:navbar.item class="max-lg:hidden" icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank" label="Repository" />
                <flux:navbar.item class="max-lg:hidden" icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank" label="Documentation" />
            </flux:navbar>
    
            <flux:dropdown position="top" align="end">
                <x-profile-avatar-dropdown initials="{{ auth()->user()->initials() }}" icon-trailing="chevron-down">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm"><span class="relative flex shrink-0 h-8 w-8 overflow-hidden rounded-lg"><span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">{{ auth()->user()->initials() }}</span></span></div>
                </x-profile-avatar-dropdown>
    
                <flux:menu>
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
        </flux:header>
    
        <flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
    
            <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
            <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />
    
            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="#" current>Home</flux:navlist.item>
                <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item>
                <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
                <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item>
    
                <flux:navlist.group expandable heading="Favorites" class="max-lg:hidden">
                    <flux:navlist.item href="#">Marketing site</flux:navlist.item>
                    <flux:navlist.item href="#">Android app</flux:navlist.item>
                    <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
    
            <flux:spacer />
    
            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>
    
        {{ $slot }}
    
        @fluxScripts
    </body>
</html>