<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Painel Administrativo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans text-gray-900">

    <!-- Topbar -->
    <header class="bg-gradient-to-r from-yellow-400 to-orange-500 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <!-- Marca VendaSmart -->
            <div class="flex items-center space-x-3">
                <span class="text-2xl font-extrabold text-white">
                    <span class="text-yellow-100">Venda</span>Smart
                </span>
                {{-- <span class="text-white font-medium hidden sm:block">
                    Painel Administrativo
                </span> --}}
            </div>

            <!-- Boas-vindas e Logout -->
            <div class="flex items-center space-x-4">
                <span class="text-white text-lg">
                    Seja Bem-vindo, <strong>{{ auth('admin')->user()->name }}</strong>
                </span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-white text-orange-600 font-semibold px-4 py-2 rounded-md hover:bg-orange-100 transition">
                        Sair
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="max-w-7xl mx-auto p-8">
        @yield('content')
    </main>

</body>
</html>
