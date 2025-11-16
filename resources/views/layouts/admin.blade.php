<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - VendaSmart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 flex min-h-screen">

    {{-- Barra lateral --}}
    <aside class="w-64 bg-gradient-to-b from-yellow-400 to-orange-500 text-white flex flex-col justify-between">
        <div>
            <div class="p-6 text-2xl font-bold">
                VendaSmart
            </div>

            <nav class="flex flex-col space-y-2 px-4">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center p-2 rounded-lg hover:bg-orange-400 transition {{ request()->routeIs('admin.dashboard') ? 'bg-orange-600' : '' }}">
                    📊 <span class="ml-2">Dashboard</span>
                </a>
                <a href="/admin/dashboard/products" class="flex items-center p-2 rounded-lg hover:bg-orange-400 transition">
                    📦 <span class="ml-2">Produtos</span>
                </a>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-orange-400 transition">
                    👥 <span class="ml-2">Clientes</span>
                </a>
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-orange-400 transition">
                    📈 <span class="ml-2">Relatórios</span>
                </a>
            </nav>
        </div>

        {{-- Rodapé / Logout --}}
        <div class="p-4 border-t border-white/30">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left flex items-center justify-between bg-red-600 hover:bg-red-700 px-3 py-2 rounded-md transition">
                    <span>Sair</span>
                    🔒
                </button>
            </form>
        </div>
    </aside>

    {{-- Conteúdo principal --}}
    <div class="flex-1 flex flex-col">
        {{-- Cabeçalho --}}
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-700">Painel Administrativo</h1>
            <span class="text-gray-600">
                Olá, <strong>{{ Auth::guard('admin')->user()->name ?? 'Administrador' }}</strong>
            </span>
        </header>

        {{-- Conteúdo dinâmico --}}
        <main class="flex-1 p-8">
            {{-- Aqui entram as páginas internas, como dashboard, relatórios, etc --}}
            @yield('content')
        </main>
    </div>

</body>
</html>
