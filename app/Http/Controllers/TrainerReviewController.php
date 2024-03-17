<?php

namespace App\Http\Controllers;

use App\Models\TrainerReview;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        if(auth()->user()->trainerReviews->contains('trainer_id', $id))
        {
            return back()->with('review','Already Review');
        }
        else {
        $attributes = request()->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);

        $trainer = User::findOrFail($id);

       TrainerReview::create([
        'review'=> $attributes['review'],
        'rating' => $request->rating,
        'user_id' => auth()->id(),
        'trainer_id' =>  $trainer->id,
       ]);

       return back()->with('success', 'Review Success');
    }
    }

    public function destroy($id) 
    {
        $review = TrainerReview::findOrFail($id);

        $review->delete();

        $reviews = TrainerReview::where('trainer_id', $review->trainer->id)->latest()->get();

            $updateReview = view('user.trainers.review',[
                'reviews' => $reviews
            ])->render();
            
            return response()->json([
                'reviews' => $updateReview
            ]);
    }

    public function update(Request $request,$id)
    {
    $review = TrainerReview::findOrFail($id);

    $newReview = $request->input('review');

    $review->update([
        'review' => $newReview,
    ]);

    $review->save();

    $reviews = TrainerReview::where('trainer_id', $review->trainer->id)->latest()->get();

            $updateReview = view('user.trainers.review',[
                'reviews' => $reviews
            ])->render();
    
            return response()->json([
                'reviews' => $updateReview
            ]);
    }
}
