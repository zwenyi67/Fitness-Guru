<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blog = Gallery::latest()->get();

            return DataTables::of($blog)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;

                    return $rowNumber;
                })
                ->addColumn('image', function ($blog) {
                    $image = "<img style='width: 100%; max-width: 300px; height: 200px; object-fit: cover; object-position: center;'
                    src='/uploads/" . $blog->image . "' alt='Photo'/>";
                    return $image;
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/galleries/' . $a->id . '/edit" class="btn btn-success mr-5 px-4 py-2" data-id="' . $a->id . '"> .Edit </a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no', 'action', 'image'])->make(true);
        }

        return view('admin.galleries.index');
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'image' => 'required|max:255|min:3|',
        ]); 

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $attributes['image'] = $imageName;

        Gallery::create($attributes);

        return redirect('/admin/galleries')->with('success','New Gallery added successfully');
    }

    public function edit($id)
    {
        $topic= Gallery::findOrFail($id);

        return view('admin.galleries.edit', [
            'topic' => $topic,
        ]);
    }

    public function update(Request $request, $id)
    {
        $topic = Gallery::findOrFail($id);

        $attributes = request()->validate([
            'image' => 'required|max:255|min:3|',
        ]); 

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $attributes['image'] = $imageName;


        $topic->update([
            'image' => $attributes['image'],
        ]);
        $topic->save();

        return redirect('/admin/galleries')->with('success', 'Gallery updated successfully');
    }

    public function destroy($id)
    {
        $topic = Gallery::findOrFail($id);

        $topic->delete();

        return 'success';
    }
}
