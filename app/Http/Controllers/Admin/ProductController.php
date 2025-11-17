<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Ou filtrados por status
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

  public function store(Request $request)
{
    Product::create($request->all());
    return redirect()->route('admin.products.index');
}


    public function edit($id)
    {
        // lógica para editar produto
    }

  public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->category = $request->input('category');
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Produto atualizado!');
}

    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');

    }
}
