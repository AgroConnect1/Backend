<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Farmer;
use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return JsonResponse
     */

    public function index()
    {
        return view('api.index');
    }
    public function products(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Display a listing of the suppliers.
     *
     * @return JsonResponse
     */
    public function suppliers(): JsonResponse
    {
        $suppliers = Supplier::select('name', 'phone_number')->get();
        return response()->json($suppliers);
    }

    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function categories(): JsonResponse
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Display a listing of the farmers.
     *
     * @return JsonResponse
     */
    public function farmers(): JsonResponse
    {
        $farmers = Farmer::all();
        return response()->json($farmers);
    }

    /**
     * Display a listing of the buyers.
     *
     * @return JsonResponse
     */
    public function buyers(): JsonResponse
    {
        $buyers = Buyer::all();
        return response()->json($buyers);
    }
    public function orders(): JsonResponse
    {
        $orders = Order::all();
        return response()->json($orders);
    }
}
