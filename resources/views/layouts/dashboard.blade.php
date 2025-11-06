@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-yellow-100 border border-yellow-300 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
            <div class="text-4xl mb-3">📦</div>
            <h2 class="text-lg font-semibold text-gray-700">Produtos</h2>
        </div>

        <div class="bg-green-100 border border-green-300 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
            <div class="text-4xl mb-3">👥</div>
            <h2 class="text-lg font-semibold text-gray-700">Clientes</h2>
        </div>

        <div class="bg-blue-100 border border-blue-300 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
            <div class="text-4xl mb-3">📈</div>
            <h2 class="text-lg font-semibold text-gray-700">Relatórios</h2>
        </div>
    </div>
@endsection
