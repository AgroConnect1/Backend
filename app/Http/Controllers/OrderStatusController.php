<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function __invoke(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,completed,canceled',
        ]);


        // Update the order status
        $order->status = $request->status;
        $order->save();

        // Return the updated order using OrderResource
        return OrderResource::make($order);
    }
}
