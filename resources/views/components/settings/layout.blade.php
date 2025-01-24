<div class="flex max-md:flex-col items-start">

        

    <div class="w-full md:w-[220px] pb-4 mr-10">
        <flux:navlist>
            <flux:navlist.item href="{{ route('settings.profile') }}" wire:navigate>Profile</flux:navlist.item>
            <flux:navlist.item href="{{ route('settings.password') }}" wire:navigate>Password</flux:navlist.item>
            <flux:navlist.item href="{{ route('settings.appearance') }}" wire:navigate>Appearance</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 max-md:pt-6 self-stretch">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="w-full max-w-lg mt-5">
            {{ $slot }}
        </div>
    </div>
</div>