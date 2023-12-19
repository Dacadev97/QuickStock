<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('productos', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->fill($request->all());
        $product->save();

        return redirect()->route('productos')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $products = Product::all();

        return view('lista', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('productos')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('productos')
                ->with('success', 'Producto eliminado correctamente');
        }

        return redirect()->route('productos')
            ->with('error', 'Producto no encontrado');
    }

    public function sell(Request $request, $id)
    {
        $product = Product::find($id);

        
        if ($product->stock > 0) {
            $quantity = $request->input('quantity');

            if ($product->stock >= $quantity) {

                $product->stock -= $quantity;
                $product->save();

                $sale = new Sale;
                $sale->product_id = $product->id;
                $sale->quantity = $quantity;
                $sale->save();

                return redirect()->back()->with('success', 'Venta realizada con éxito.');
            } else {

                return redirect()->back()->with('error', 'No hay suficiente stock para la venta.');
            }
        } else {

            return redirect()->back()->with('error', 'No es posible realizar la venta, el producto no tiene stock.');
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    
        return view('ventas', compact('products'));
    }
}
