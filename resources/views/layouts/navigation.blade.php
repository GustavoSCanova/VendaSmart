<nav class="bg-gradient-to-r from-yellow-400 to-orange-500 p-4 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="text-2xl font-bold text-white">
            VendaSmart
        </a>

        {{-- Barra de busca --}}
        
        {{-- <form action="{{ route('search') }}" method="GET" class="flex w-full">
            <input type="text" name="q" placeholder="Buscar produtos..."
                class="flex-1 px-4 py-2 rounded-l-md focus:outline-none" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition">
                Buscar
            </button>
        </form> --}}

        {{-- Área do usuário --}}
        <div class="flex items-center space-x-4 text-white">

            {{-- Se for cliente logado --}}
            @auth
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">Olá, {{ Auth::user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-white text-orange-600 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                            Sair
                        </button>
                    </form>
                </div>
            @endauth

            {{-- Se for administrador logado --}}
            @auth('admin')
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">👑 {{ Auth::guard('admin')->user()->name }}</span>

                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-white text-orange-600 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Painel
                    </a>

                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth

            {{-- Visitante (não logado) --}}
            @guest
            
            <div class="flex items-center space-x-4 text-white">

                <div class="flex items-center space-x-2">
                    <a href="{{ route('login') }}"
                        class="bg-white text-orange-600 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-white text-orange-600 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Criar conta
                    </a>
                </div>


            </div>
            @endguest

              <div class="flex items-center space-x-4 text-white">

                <a href="http://127.0.0.1:8000/cart" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 2.25h1.5l1.5 12.75h12.75l1.5-9H6.75"></path>
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1.5 rounded-full">
                        
                    </span>
                </a>
            </div>

        </div>
    </div>
</nav>

            {{-- Ícone do carrinho --}}
            {{-- <a href="{{ route('cart.index') }}" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 2.25h1.5l1.5 12.75h12.75l1.5-9H6.75" />
                </svg>
                <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1.5 rounded-full">
                    2
                </span>
            </a> --}}
            