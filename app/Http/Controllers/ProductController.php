<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        if ($request->has('sort')) {
            $query->orderBy('price', $request->sort);
        }

        return response()->json($query->get());
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'farmer_id' => 'required|exists:farmers,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string',
            'stock_quantity' => 'required|integer',
            'image_url' => 'url',
        ]);

        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    public function updete(Request $request,$id) {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'price' => 'numeric',
            'stock_quantity' => 'integer',
        ]);

        $product->update($validatedData);

        return response()->json($product);
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
