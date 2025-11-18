@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-6 rounded-lg shadow items-start">
        <div class="flex justify-center md:justify-start">
            @if($product->image)
                <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full max-w-md h-auto object-contain rounded">
            @else
                <img src="https://via.placeholder.com/600x420" alt="{{ $product->name }}" class="w-full max-w-md h-auto object-contain rounded">
            @endif
        </div>

        <div class="flex flex-col justify-between space-y-6">
            <div>
                <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-yellow-600 font-bold text-xl mb-4">R$ {{ number_format($product->price, 2, ',', '.') }}</p>

                {{-- Mostrar resumo com opção de "Ver mais" para não ocupar tanto espaço --}}
                @php
                    $limit = 400;
                    $desc = $product->description ?? '';

                    // Tentar separar 'Características' e 'Especificações' por marcador
                    $chars = '';
                    $specs = $desc;
                    $marker1 = 'Especificações:';
                    $marker2 = 'Especificacoes:';

                    if (mb_stripos($desc, $marker1) !== false) {
                        [$charsPart, $rest] = explode($marker1, $desc, 2);
                        $chars = trim($charsPart);
                        $specs = trim($rest); // não incluir o marcador
                    } elseif (mb_stripos($desc, $marker2) !== false) {
                        [$charsPart, $rest] = explode($marker2, $desc, 2);
                        $chars = trim($charsPart);
                        $specs = trim($rest);
                    } else {
                        // sem separador, usar um trecho inicial como 'características'
                        $chars = \Illuminate\Support\Str::before($desc, "\n\n");
                        if (!$chars) {
                            $chars = \Illuminate\Support\Str::limit($desc, 200);
                        }
                        $specs = $desc;
                    }

                    // Remover possíveis títulos repetidos dentro dos textos
                    $chars = preg_replace('/^\s*(Características:|Caracteristicas:)\s*/iu', '', $chars);
                    $specs = preg_replace('/^\s*(Especificações:|Especificacoes:)\s*/iu', '', $specs);
                @endphp

             

                {{-- Características exibidas sempre abaixo do preço --}}
                @if(trim($chars) !== '')
                    <h3 class="text-base md:text-lg font-semibold text-gray-700 mb-2">Características:</h3>
                    <div class="text-gray-800 mb-4 leading-relaxed text-lg md:text-2xl">
                        {!! nl2br(e($chars)) !!}
                    </div>
                @endif

                <h3 class="text-base md:text-lg font-semibold text-gray-700 mb-2">Especificações:</h3>

                <div class="text-gray-700 mb-4 leading-relaxed text-lg md:text-xl">
                    {{-- Container relativo: preview, fade e versão completa --}}
                    <div id="desc-container" class="relative mb-2">
                        <div id="desc-preview" class="max-h-48 overflow-hidden whitespace-pre-wrap break-words">{{ \Illuminate\Support\Str::limit($specs, $limit, '...') }}</div>
                        <div id="desc-fade" class="pointer-events-none absolute left-0 right-0 bottom-0 h-20 bg-gradient-to-t from-white to-transparent"></div>
                        <div id="desc-full" class="hidden whitespace-pre-wrap break-words">{{ $specs }}</div>
                    </div>
                </div>

                {{-- Botão de expandir, logo após as especificações --}}
                    @if(mb_strlen($specs) > $limit)
                        <div class="mt-3">
                            <button id="desc-toggle-top" type="button" class="inline-flex items-center gap-2 text-sm md:text-base bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md shadow">
                                <span id="desc-toggle-text">Ver descrição completa</span>
                                <svg id="desc-toggle-icon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    @endif

                <p class="text-sm text-gray-500 mb-6">Categoria: <span class="font-medium text-gray-700">{{ $product->category }}</span></p>
            </div>

            <div>
                <form method="GET" action="{{ route('cart.add', $product->id) }}" class="flex items-center gap-3">
                    <label for="quantity" class="sr-only">Quantidade</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-24 border rounded-lg p-2" />

                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg font-semibold">Adicionar ao carrinho</button>

                    <a href="{{ route('cart.index') }}" class="ml-2 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Ver carrinho</a>
                </form>

                <div class="mt-4 text-sm text-gray-600">
                    <p>Frete e prazos calculados no carrinho.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    // Verifica botão superior (compact)
    const toggleTop = document.getElementById('desc-toggle-top');
    const preview = document.getElementById('desc-preview');
    const full = document.getElementById('desc-full');
    const fade = document.getElementById('desc-fade');
    const toggleText = document.getElementById('desc-toggle-text');
    const toggleIcon = document.getElementById('desc-toggle-icon');
    if(!preview || !full) return;
    let expanded = false;

    function setExpanded(state){
        expanded = state;
        if(expanded){
            // mostra a descrição completa
            preview.classList.add('hidden');
            full.classList.remove('hidden');
            if(fade) fade.classList.add('hidden');
            if(toggleText) toggleText.textContent = 'Ver menos';
            if(toggleIcon) toggleIcon.classList.add('rotate-180');
        } else {
            // volta para preview com fade
            preview.classList.remove('hidden');
            full.classList.add('hidden');
            if(fade) fade.classList.remove('hidden');
            if(toggleText) toggleText.textContent = 'Ver descrição completa';
            if(toggleIcon) toggleIcon.classList.remove('rotate-180');
        }
    }

    if(toggleTop){
        toggleTop.addEventListener('click', function(){
            setExpanded(!expanded);
        });
    }
    // inicializa estado fechado
    setExpanded(false);
});
</script>
@endpush
