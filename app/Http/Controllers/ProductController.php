<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = Http::get('https://v6.exchangerate-api.com/v6/3a5439c13e9f45ce9279c7a2/latest/MXN');
        $exchangeRate = $response->json()['conversion_rates']['USD'];

        $order = $request->get('order', 'nombre');
        $direction = $request->get('direction', 'asc');

        $products = Product::orderBy($order, $direction)->get();
        foreach ($products as $product) {
            $product->precio_usd = $product->precio_MXN * $exchangeRate;
        }
        return view('products.index', compact('products','order', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'detalle' => 'nullable|string',
            'sku' => 'required|string|unique:products',
            'puntos' => 'required|integer',
            'precio_MXN' => 'required|numeric',
            'active' => 'boolean',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Product $product)
{
    $product->active = !$product->active;
    $product->save();

    return redirect()->route('products.index');
}
    public function update(Request $request,Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'detalle' => 'nullable|string',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'puntos' => 'required|integer',
            'precio_MXN' => 'required|numeric',
            'active' => 'boolean',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');


    }
}
