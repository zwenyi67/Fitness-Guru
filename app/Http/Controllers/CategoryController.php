<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $types = Category::latest()->get();

            return DataTables::of($types)

                ->addColumn('no', function ($author) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/categories/'.$a->id.'/edit" class="btn btn-primary mr-5 px-4 py-2" data-id="' . $a->id . '">Edit</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no','action'])->make(true);
        }

        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:categories,name',
        ]); 

        Category::create($attributes);

        return redirect('/admin/categories')->with('success','New Category added successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:categories,name',
        ]);

        $category->update([
            'name' => $attributes['name'],
        ]);
        $category->save();

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return 'success';
    }
}
