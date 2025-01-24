<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <div class="text-center w-full gap-2 flex flex-col">
        <h1 class="text-xl font-bold dark:text-zinc-200">Log in to your account</h1>
        <p class="text-center text-sm dark:text-zinc-400">Enter your email and password below to log in</p>
    </div>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <div class="grid gap-2">
            <flux:input wire:model="name" id="name" class="block mt-1 w-full" label="{{ __('Name') }}" type="text" name="name" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="grid gap-2">
            <flux:input wire:model="email" id="email" class="block mt-1 w-full" label="{{ __('Email Address') }}" type="email" name="email" required autocomplete="email" />
        </div>

        <!-- Password -->
        <div class="grid gap-2">
            <flux:input wire:model="password" id="password" class="block mt-1 w-full" label="{{ __('Password') }}" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="grid gap-2">
            <flux:input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" label="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Register') }}
            </flux:button>
        </div>
    </form>

    <div class="text-center text-sm">
        Already have an account? <a class="underline underline-offset-4" tabindex="4" href="{{ route('login') }}">Log in</a>
    </div>

</div>
