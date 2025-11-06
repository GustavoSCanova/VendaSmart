@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Painel do Administrador</h1>
    <p>Bem-vindo, {{ $admin->name ?? 'Administrador' }}!</p>
@endsection
