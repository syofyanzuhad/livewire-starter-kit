<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
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
    
    <x-auth-header 
        title="Log in to your account"
        description="Enter your email and password below to log in"
    />
    
    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
            <flux:input wire:model="form.email" label="{{ __('Email address') }}" type="email" name="email" required autofocus autocomplete="email" />
        

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="form.password" label="{{ __('Password') }}" type="password" name="password" required
                autocomplete="current-password" />
            @if (Route::has('password.request'))
                <x-text-link    
                    class="absolute top-0 right-0"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </x-text-link>
            @endif
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
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Log In') }}</flux:button>
        </div>
    </form>
    <div class="text-center text-sm">
        Don't have an account? <x-text-link href="{{ route('register') }}">Sign up</x-text-link>
    </div>
</div>
