<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VendaSmart - Seu e-commerce moderno</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-yellow-400 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">VendaSmart</h1>

            <div class="flex-1 mx-6">
                <input type="text" placeholder="Buscar produtos..." 
                    class="w-full px-4 py-2 rounded-lg focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>

            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-800 hover:text-gray-700 font-medium">Entrar</a>
                <a href="#" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8h13.2L17 13M7 13h10" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1">2</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="bg-gradient-to-r from-yellow-400 to-orange-500 py-16 text-center text-white">
        <h2 class="text-4xl font-extrabold mb-4">As melhores ofertas estão aqui!</h2>
        <p class="text-lg mb-6">Economize em eletrônicos, moda, beleza e muito mais.</p>
        <a href="#" class="bg-white text-yellow-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition">Ver ofertas</a>
    </section>

    <!-- CATEGORIAS -->
    <section class="py-12 max-w-7xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-6">Categorias populares</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-6">
            @foreach(['Eletrônicos', 'Moda', 'Beleza', 'Casa', 'Esportes', 'Automotivo'] as $categoria)
                <div class="bg-white shadow rounded-lg p-4 text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-yellow-100 mx-auto mb-2 rounded-full flex items-center justify-center text-yellow-600 font-bold">
                        {{ substr($categoria, 0, 1) }}
                    </div>
                    <p class="font-medium text-gray-700">{{ $categoria }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- PRODUTOS EM DESTAQUE -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-2xl font-bold mb-6">Produtos em destaque</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach(range(1,8) as $i)
                    <div class="border rounded-xl p-4 hover:shadow-lg transition">
                        <img src="https://via.placeholder.com/300x200" alt="Produto" class="rounded-md mb-3">
                        <h4 class="font-semibold text-lg">Produto {{ $i }}</h4>
                        <p class="text-yellow-600 font-bold mt-1">R$ {{ 49.90 + $i }}</p>
                        <button class="mt-3 w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg">Adicionar ao carrinho</button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROMOÇÕES -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 py-16 text-center text-white">
        <h3 class="text-3xl font-extrabold mb-4">Ofertas imperdíveis</h3>
        <p class="text-lg mb-6">Descontos de até <span class="font-bold">60%</span> em produtos selecionados</p>
        <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition">Aproveitar agora</a>
    </section>

    <!-- DEPOIMENTOS -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-bold mb-8">O que nossos clientes dizem</h3>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['João', 'Ótimos produtos e entrega rápida!'],
                    ['Maria', 'Site fácil de usar e com preços incríveis!'],
                    ['Carlos', 'Comprei e recomendo! Atendimento excelente.']
                ] as [$nome, $mensagem])
                    <div class="bg-white rounded-xl shadow p-6">
                        <p class="italic mb-3 text-gray-600">"{{ $mensagem }}"</p>
                        <h4 class="font-bold text-yellow-600">{{ $nome }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
            <div>
                <h4 class="font-bold text-white mb-3">VendaSmart</h4>
                <p class="text-sm">Seu e-commerce moderno com as melhores ofertas do mercado.</p>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Institucional</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:underline">Sobre nós</a></li>
                    <li><a href="#" class="hover:underline">Política de privacidade</a></li>
                    <li><a href="#" class="hover:underline">Termos de uso</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Atendimento</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:underline">Fale conosco</a></li>
                    <li><a href="#" class="hover:underline">Central de ajuda</a></li>
                    <li><a href="#" class="hover:underline">Rastrear pedido</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-3">Siga-nos</h4>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-yellow-400">🐦</a>
                    <a href="#" class="hover:text-yellow-400">📘</a>
                    <a href="#" class="hover:text-yellow-400">📸</a>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-10">
            © {{ date('Y') }} VendaSmart — Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>
