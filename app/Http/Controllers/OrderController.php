<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderQuery;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new OrderQuery();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            $Orders = Order::all();
            return OrderResource::collection($Orders);
        } else {
            return OrderResource::collection(Order::where($queryItems)->get());
        }
    }

    public function store(StoreOrderRequest $request)
    {
        // Check For Enough Stock
        $Order = Order::findOrFail($request->Order_id);

        // Reduce Stock Quantity
        $Order->stock_quantity -= $request->quantity;
        $Order->save();

        // Create The Order
        $order = Order::create($request->validated());

        return OrderResource::make($order);
    }
    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $Order = Order::findOrFail($request->Order_id);

        // Reduce Stock Quantity
        $Order->stock_quantity -= $request->quantity;
        $Order->save();

        $order->update($request->validated());
        return OrderResource::make($order);
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}
