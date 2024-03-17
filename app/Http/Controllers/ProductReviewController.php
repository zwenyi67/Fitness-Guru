<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        if(auth()->user()->productReviews->contains('product_id', $id))
        {
            return back()->with('review','Already Review');
        }
        else {

        $attributes = request()->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);

        $product = Product::findOrFail($id);

       ProductReview::create([
        'review'=> $attributes['review'],
        'rating' => $request->rating,
        'user_id' => auth()->id(),
        'product_id' =>  $product->id,
       ]);

       return back()->with('success', 'Review Success');
    }
    }

    public function destroy($id) 
    {
        $review = ProductReview::findOrFail($id);

        $review->delete();

        $reviews = ProductReview::where('product_id', $review->product->id)->latest()->get();

            $updateReview = view('user.products.review',[
                'reviews' => $reviews
            ])->render();
    
            return response()->json([
                'reviews' => $updateReview
            ]);
    }

    public function update(Request $request,$id)
    {
    $review = ProductReview::findOrFail($id);

    $newReview = $request->input('review');

    $review->update([
        'review' => $newReview,
    ]);

    $review->save();

    $reviews = ProductReview::where('product_id', $review->product->id)->latest()->get();

            $updateReview = view('user.products.review',[
                'reviews' => $reviews
            ])->render();
    
            return response()->json([
                'reviews' => $updateReview
            ]);
    }



}
