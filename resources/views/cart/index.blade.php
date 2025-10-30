@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">🛒 Meu Carrinho</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <div class="text-center bg-white p-8 rounded shadow">
            <p class="text-gray-600 text-lg">Seu carrinho está vazio.</p>
            <a href="{{ route('products.index') }}"
               class="inline-block mt-4 px-6 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
               Ver produtos
            </a>
        </div>
    @else
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left py-3 px-4">Produto</th>
                        <th class="text-left py-3 px-4">Preço</th>
                        <th class="text-left py-3 px-4">Quantidade</th>
                        <th class="text-left py-3 px-4">Total</th>
                        <th class="py-3 px-4 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        <tr class="border-b">
                            <td class="py-3 px-4 flex items-center space-x-3">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 rounded object-cover">
                                @endif
                                <span class="font-semibold">{{ $item['name'] }}</span>
                            </td>
                            <td class="py-3 px-4">R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                            <td class="py-3 px-4">{{ $item['quantity'] }}</td>
                            <td class="py-3 px-4 font-semibold">
                                R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('cart.remove', $id) }}" class="text-red-600 hover:text-red-800">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4 flex justify-between items-center">
                <p class="text-xl font-bold">Total: R$ {{ number_format($total, 2, ',', '.') }}</p>
                <div class="flex gap-4">
                    <a href="{{ route('cart.clear') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                       Esvaziar
                    </a>
                    <a href="#"
                       class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                       Finalizar compra
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
