@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-orange-600 mb-6">Entrar na VendaSmart</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full border-gray-300 rounded-md shadow-sm mt-1 focus:ring-orange-400 focus:border-orange-400">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Senha --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Senha</label>
                <input id="password" type="password" name="password" required
                       class="w-full border-gray-300 rounded-md shadow-sm mt-1 focus:ring-orange-400 focus:border-orange-400">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Lembrar-me --}}
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember"
                       class="text-orange-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 text-gray-700 text-sm">Lembrar-me</label>
            </div>

            {{-- Botão de login --}}
            <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md font-semibold">
                Entrar
            </button>

            {{-- Link para cadastro --}}
            <p class="text-center text-sm text-gray-600 mt-4">
                Não tem uma conta?
                <a href="{{ route('register') }}" class="text-orange-500 font-medium hover:underline">Cadastre-se</a>
            </p>
        </form>
    </div>
</div>
@endsection
