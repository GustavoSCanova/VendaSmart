@extends('layouts.admin')

@section('title', 'Painel do Administrador')

@section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-4xl text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">Painel do Administrador</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Produtos -->
                <a href="#"
                   class="bg-yellow-100 hover:bg-yellow-200 transition p-6 rounded-lg shadow-sm flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600 mb-3" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h18v4H3V3zm0 6h18v12H3V9z"/>
                    </svg>
                    <span class="font-medium text-gray-700">Produtos</span>
                </a>

                <!-- Clientes -->
                <a href="#"
                   class="bg-blue-100 hover:bg-blue-200 transition p-6 rounded-lg shadow-sm flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-3" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5V4H2v16h5m10 0v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6"/>
                    </svg>
                    <span class="font-medium text-gray-700">Clientes</span>
                </a>

                <!-- Relatórios -->
                <a href="#"
                   class="bg-cyan-100 hover:bg-cyan-200 transition p-6 rounded-lg shadow-sm flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600 mb-3" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 3v18M4 21h16"/>
                    </svg>
                    <span class="font-medium text-gray-700">Relatórios</span>
                </a>

            </div>
        </div>
    </div>
@endsection
