@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Painel do Administrador</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Sair</button>
            </form>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <a href="#" class="p-6 bg-yellow-100 hover:bg-yellow-200 rounded-lg shadow text-center font-semibold">📦 Produtos</a>
            <a href="#" class="p-6 bg-green-100 hover:bg-green-200 rounded-lg shadow text-center font-semibold">👥 Clientes</a>
            <a href="#" class="p-6 bg-blue-100 hover:bg-blue-200 rounded-lg shadow text-center font-semibold">📊 Relatórios</a>
        </div>
    </div>
</div>
@endsection
