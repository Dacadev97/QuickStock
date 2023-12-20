<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();

        return view('ventas', ['sales' => $sales]);
    }

    public function showSales()
    {
        $sales = Sale::with('product')->get();

        return view('ventas', compact('sales'));
    }
}
