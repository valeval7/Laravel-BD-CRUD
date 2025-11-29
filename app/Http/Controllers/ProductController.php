<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::with('category')->latest()->paginate(10);
    return view('products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::orderBy('name')->get();
    return view('products.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ProductRequest $request)
  {
    Product::create($request->validated());
    return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    $product->load('category');
    return  view('products.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    if (!$product->exists) {
      abort(404, 'Producto no encontrado');
    }
    $categories = Category::orderBy('name')->get();
    return view('products.edit', compact('product', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ProductRequest $request, Product $product)
  {
    $product->update($request->validated());
    return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
  }
}
