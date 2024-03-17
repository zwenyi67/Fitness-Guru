<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($id)
    {

        $blog = Blog::findOrFail($id);

       Like::create([
        'user_id' => auth()->id(),
        'blog_id' =>  $blog->id,
       ]);

       return back()->with('success');
    }

    public function destroy($id) 
    {
        $blog = Blog::findOrFail($id);

         Like::where('user_id', auth()->id())->delete();
    }
}
