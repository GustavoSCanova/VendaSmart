<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Ou filtrados por status
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'specification' => 'nullable|string',
        'price' => 'required',
        'category' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('admin.products.index');
}

public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'specification' => 'nullable|string',
        'price' => 'required',
        'category' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('admin.products.index');
}

public function destroy(Product $product)
{
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    $product->delete();

    return redirect()->route('admin.products.index');
}

    /**
     * Exibe a página pública de detalhe do produto.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
