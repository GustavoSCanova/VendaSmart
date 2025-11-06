<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - VendaSmart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-yellow-400 to-orange-500 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-orange-500 mb-6">Painel Administrativo</h2>

        @if($errors->any())
            <p class="text-red-500 text-center mb-4">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" required class="w-full mt-1 border-gray-300 rounded-md focus:ring-orange-400 focus:border-orange-400">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" required class="w-full mt-1 border-gray-300 rounded-md focus:ring-orange-400 focus:border-orange-400">
            </div>

            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-md transition">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
