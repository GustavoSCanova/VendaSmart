<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
public function index()
{
    return response()->json(['ok' => true]);
}

}
