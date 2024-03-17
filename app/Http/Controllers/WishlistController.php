<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller

{

    public function index() {
        return view('main.wishlist', [
            'wishes' => Wishlist::where('user_id', auth()->id())->get(),
        ]);
    }

    public function wishAdd($id) {

        $product = Product::findOrFail($id);

         Wishlist::create([
        'user_id' => auth()->id(),
        'product_id' =>  $product->id,
         ]);

         session()->flash('success', 'Added to wishlist');
    }

    public function wishRemove($id) {
        $product = Product::findOrFail($id);
        $user = auth()->id();
    
        $wishlist = Wishlist::where('user_id', $user)->where('product_id', $product->id)->first();
    
        if ($wishlist) {
            $wishlist->delete();
            session()->flash('success', 'Removed from wishlist');
        } else {
            return back()->with('error', 'Item not found in wishlist');
        }
    }
    
}
