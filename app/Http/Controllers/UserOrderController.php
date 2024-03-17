<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index()
    {
        return view("main.order", [
            "orders" => Order::where("user_id", auth()->user()->id)->orderBy("status")->get(),
            "pendings" => Order::where("status", 0)->where("user_id", auth()->user()->id)->latest("status")->get(),
            "receives" => Order::where("status", 2)->where("user_id", auth()->user()->id)->latest()->get(),

        ]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return 'success';
    }

    public function productDestroy($order_id, $product_id)
    {
        try {
            $order = Order::findOrFail($order_id);
    
            if ($order->products->count() == 1) {
                $order->products()->detach($product_id);
    
                $order->delete();
    
                return 'success';
               
            } else{
                $order->products()->detach($product_id);
                return 'success';
            }
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
}
