<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    
            <a href="#" class="flex space-x-2 items-center mr-5">
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
    
            <flux:dropdown position="top" align="start">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
    
                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>
    
                    <flux:menu.separator />
    
                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
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