<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddtocartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $product->total_qty )
            {
                $cart[$id]['quantity']++;
            }
            else {
                session()->flash('error', 'Out of Stock');
            }
        } 
        
        else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }
        session()->put('cart', $cart);

        session()->flash('success', 'Product has added to cart');
    }

    public function detailAdd($id, Request $request) {
        
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $product->total_qty )
            {
                $cart[$id]['quantity'] =  $cart[$id]['quantity'] + $request->quantity;
            }
            else {
                session()->flash('error', 'Out of Stock');
            }
        }
        else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "image" => $product->image,
            ];
        } 
        session()->put('cart', $cart);

        session()->flash('success', 'Product has added to cart');
    }

    public function cart()
    {
        return view("user.products.cart");
    }

    public function checkout(Request $request) {

        return view("user.products.checkout");

    }

    public function removeProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product deleted');
        }
    }

   
    public function decrease(Request $request)
    {
        $productId = $request->id;

        if ($productId) {
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = max(1, $cart[$productId]['quantity'] - 1);
                session()->put('cart', $cart);
                $quantity = view('user.products.quantity',[
                    'quantity' => $cart[$productId]['quantity']])->render();
                return response()->json(['quantity' => $quantity]);
            }
        }
    }

     public function increase(Request $request)
    {
        $productId = $request->id;

        $product = Product::findOrFail($productId);

        if ($productId) {
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = min($product->total_qty , $cart[$productId]['quantity'] + 1);
                session()->put('cart', $cart);
                $quantity = view('user.products.quantity',[
                    'quantity' => $cart[$productId]['quantity']])->render();
                return response()->json(['quantity' => $quantity]);
            }
        }
    } 

  


}
