@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-orange-600 mb-6">Criar conta na VendaSmart</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nome --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nome completo</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full border-gray-300 rounded-md shadow-sm mt-1 focus:ring-orange-400 focus:border-orange-400">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

            {{-- Confirmação --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700">Confirmar senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full border-gray-300 rounded-md shadow-sm mt-1 focus:ring-orange-400 focus:border-orange-400">
            </div>

            {{-- Botão de cadastro --}}
            <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md font-semibold">
                Criar conta
            </button>

            {{-- Link para login --}}
            <p class="text-center text-sm text-gray-600 mt-4">
                Já tem uma conta?
                <a href="{{ route('login') }}" class="text-orange-500 font-medium hover:underline">Entrar</a>
            </p>
        </form>
    </div>
</div>
@endsection
