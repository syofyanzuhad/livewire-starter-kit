<?php

use Livewire\Volt\Volt;

Volt::route('login', 'auth.login')->name('login');
Volt::route('register', 'auth.register')->name('register');