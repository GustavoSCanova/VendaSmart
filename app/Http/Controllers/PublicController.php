<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // supondo que você tenha o model Product

class PublicController extends Controller
{
    public function home()
    {
        // Exibe página inicial
        return view('home');
    }

   public function search(Request $request)
{
    $query = $request->input('q');

    $products = Product::query()
        ->where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->get();

    return view('search-results', compact('query', 'products'));

        // Busca simples de produtos (ajuste conforme sua modelagem)
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return view('search-results', [
            'query' => $query,
            'products' => $products,
        ]);
    }
}


