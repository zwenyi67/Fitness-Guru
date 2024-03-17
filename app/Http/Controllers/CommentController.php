<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $attributes = request()->validate([
            'comment' => 'required',
        ]);

        $blog = Blog::findOrFail($id);

       Comment::create([
        'comment'=> $attributes['comment'],
        'user_id' => auth()->id(),
        'blog_id' =>  $blog->id,
       ]);

       return back()->with('success', 'Comment Success');
    }

    public function destroy($id) 
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        $comments = Comment::where('blog_id', $comment->blog->id)->latest()->get();

            $updateComment = view('admin.blogs.comment',[
                'comments' => $comments
            ])->render();
    
            return response()->json([
                'comments' => $updateComment
            ]);
    }

    public function delete($id) 
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        $comments = Comment::where('blog_id', $comment->blog->id)->latest()->get();

            $updateComment = view('user.blogs.comment',[
                'comments' => $comments
            ])->render();
    
            return response()->json([
                'comments' => $updateComment
            ]);
    }

    public function update(Request $request,$id)
    {
    $comment = Comment::findOrFail($id);

    $newComment = $request->input('comment');

    $comment->update([
        'comment' => $newComment,
    ]);

    $comment->save();

    $comments = Comment::where('blog_id', $comment->blog->id)->latest()->get();

            $updateReview = view('user.blogs.comment',[
                'comments' => $comments
            ])->render();
    
            return response()->json([
                'comments' => $updateReview
            ]);
    }
}
