<?php

use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {
    //
}; ?>

<div class="flex flex-col items-start">
    <div class="w-full mb-10 relative">
        <flux:heading size="xl" level="1">Settings</flux:heading>

        <flux:subheading size="lg" class="mb-6">Manage your profile and account setting</flux:subheading>

        <flux:separator variant="subtle" />
    </div>

    <div class="flex max-md:flex-col items-start">

        

        <div class="w-full md:w-[220px] pb-4 mr-10">
            <flux:navlist>
                <flux:navlist.item href="#">Profile</flux:navlist.item>
                <flux:navlist.item href="#">Password</flux:navlist.item>
                <flux:navlist.item href="#" current>Appearance</flux:navlist.item>
            </flux:navlist>
        </div>

        <flux:separator class="md:hidden" />

        <div class="flex-1 max-md:pt-6 self-stretch">
            <flux:heading>Appearance</flux:heading>
        <flux:subheading>Update your account's appearance settings</flux:subheading>

            <div class="w-full max-w-xs mt-5">
                <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                    <flux:radio value="light" icon="sun">Light</flux:radio>
                    <flux:radio value="dark" icon="moon">Dark</flux:radio>
                    <flux:radio value="system" icon="computer-desktop">System</flux:radio>
                </flux:radio.group>
            </div>
        </div>
    </div>
</div>
