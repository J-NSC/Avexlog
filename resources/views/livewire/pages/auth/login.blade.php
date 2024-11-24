<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('images/tela-fundo.png');">
    <div class="bg-white bg-opacity-90 rounded-md shadow-lg p-6 max-w-md w-full">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-24 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Login</h2>
        </div>

        <form wire:submit="login" class="mt-6">


            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Login:</label>
                <input wire:model="form.email" id="email" name="email" type="text" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha:</label>
                <input wire:model="form.password" id="password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-md shadow">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>



