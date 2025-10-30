<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // lógica para salvar produto
    }

    public function edit($id)
    {
        // lógica para editar produto
    }

    public function update(Request $request, $id)
    {
        // lógica para atualizar produto
    }

    public function destroy($id)
    {
        // lógica para excluir produto
    }
}
