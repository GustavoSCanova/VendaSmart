@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Resultados para "{{ $query }}"
        </h1>

        @if($products->isEmpty())
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <p class="text-gray-600 text-lg">
                    Nenhum produto encontrado para sua pesquisa 😕
                </p>
                <a href="{{ route('home') }}"
                    class="inline-block mt-4 px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                    Voltar para página inicial
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                Sem imagem
                            </div>
                        @endif

                        <div class="p-4 flex flex-col justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 truncate">
                                {{ $product->name }}
                            </h2>
                            <p class="text-gray-500 text-sm line-clamp-2">
                                {{ $product->description }}
                            </p>
                            <div class="mt-3">
                                <p class="text-yellow-600 font-bold text-lg">
                                    R$ {{ number_format($product->price, 2, ',', '.') }}
                                </p>
                                <a href="#"
                                   class="block text-center mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    Ver produto
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
