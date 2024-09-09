<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductQuery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ProductQuery();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            $products = Product::all();
            return ProductResource::collection($products);
        } else {
            return ProductResource::collection(Product::where($queryItems)->get());
        }
    }
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return ProductResource::make($product);
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return ProductResource::make($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
