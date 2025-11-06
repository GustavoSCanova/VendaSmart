@extends('layouts.admin')

@section('title', 'Dashboard - VendaSmart')

@section('content')
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Painel de Controle</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Clientes -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Clientes</h3>
                    <p class="text-sm text-gray-500">Gerencie seus clientes</p>
                </div>
                <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5V4H2v16h5m10 0v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-orange-500 font-medium hover:underline">Ver clientes →</a>
            </div>
        </div>

        <!-- Estoque -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Estoque</h3>
                    <p class="text-sm text-gray-500">Gerencie produtos e quantidades</p>
                </div>
                <div class="bg-green-100 text-green-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h18v4H3V3zm0 6h18v12H3V9z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-orange-500 font-medium hover:underline">Ver estoque →</a>
            </div>
        </div>

        <!-- Estatísticas -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Estatísticas</h3>
                    <p class="text-sm text-gray-500">Acompanhe o desempenho de vendas</p>
                </div>
                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3v18M4 21h16" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-orange-500 font-medium hover:underline">Ver estatísticas →</a>
            </div>
        </div>

    </div>
@endsection
