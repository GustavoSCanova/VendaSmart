<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtém o admin logado
        $admin = Auth::guard('admin')->user();

        // Renderiza a view com os dados do admin
        return view('admin.dashboard', compact('admin'));
    }
}
