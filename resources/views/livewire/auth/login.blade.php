<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <div class="text-center w-full gap-2 flex flex-col">
        <h1 class="text-xl font-bold dark:text-zinc-200">Log in to your account</h1>
        <p class="text-center text-sm dark:text-zinc-400">Enter your email and password below to log in</p>
    </div>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    
    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div class="grid gap-2">
            <flux:input wire:model="form.email" label="{{ __('Email Address') }}" type="email" name="email" class="focus:bg-pink-400" required autofocus autocomplete="email" />
        </div>

        <!-- Password -->
        <div class="grid gap-2">
            <flux:input wire:model="form.password" label="{{ __('Password') }}" type="password" name="password" required
                autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 hidden">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <flux:button variant="primary" class="w-full">{{ __('Log In') }}</flux:button>
        </div>
    </form>
    <div class="text-center text-sm">
        Don't have an account? <a class="underline underline-offset-4" tabindex="4" href="/register">Sign up</a></div>
</div>
