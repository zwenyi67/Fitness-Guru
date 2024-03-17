<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blog = Blog::where('user_id',auth()->id())->latest()->get();

            return DataTables::of($blog)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;

                    return $rowNumber;
                })
                ->addColumn('image', function ($blog) {
                    $image = "<img style='width: 60px; height: 90px; object-fit: cover; object-position: center;'
                    src='/uploads/" . $blog->image . "' alt='Photo'/>";
                    return $image;
                })
                ->editColumn('content' , function ($blog) {
                    return ''. Str::words($blog->content, 25) .'';
                })

                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/blogs/' . $a->id . '/detail" class="btn btn-primary mr-5 px-4 py-2" data-id="' . $a->id . '">Detail</a>';
                    $edit = '<a href="/admin/blogs/' . $a->id . '/edit" class="btn btn-success mr-5 px-4 py-2" data-id="' . $a->id . '"> .Edit </a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail . $edit . $delete . '</div>';
                })->rawColumns(['no', 'action', 'image'])->make(true);
        }

        return view('admin.blogs.index');
    }
    
    public function create() {
        return view("admin.blogs.create");
    }  

    public function store(Request $request) {
        $attributes = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|min:10',
            'title' => 'required|min:3',
        ]); 

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        
        $image->move(public_path('uploads'), $imageName);
        
        $attributes['image'] = $imageName;
        $attributes['user_id'] = auth()->id();

        Blog::create($attributes);

        return redirect('/admin/blogs')->with('success','Blog Uploaded !');
    }

    public function show($id) 
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.detail' , [
            'blog'=> $blog,
            'comments' => Comment::where('blog_id', $blog->id)->latest()->get(),
        ]);

    }

    

    public function edit($id) {
        $blog = Blog::find($id);
        return view('admin.blogs.edit', [
            'blog'=> $blog,
        ]);
    }

    public function update(Request $request, $id) {

        $blog = Blog::findOrFail($id);

        $attributes = request()->validate([
            'content'=> 'required|min:3',
            'title'=> 'required|min:3',
            ]);
            
            $blog->update($attributes);

            return redirect('/admin/blogs/'.$blog->id.'/detail')->with('success', 'Blog updated successfully');
        }

        public function imageChange(Request $request, $id)
    {
        $attributes = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $attributes['image'] = $imageName;

        $blog = Blog::findOrFail($id);

        $blog->update([
            'image' => $attributes['image'],
        ]);

        $blog->save();

        return back()->with('success', 'Image changed successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return 'success';
    }

    public function detail($id) {
        $blog = Blog::find($id);
        return view('user.blogs.detail' , [
            'blog'=> $blog,
            'comments' => Comment::where('blog_id', $blog->id)->latest()->get(),
        ]);
    }


}
