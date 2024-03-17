<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SportController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $types = Sport::latest()->get();

            return DataTables::of($types)

                ->addColumn('no', function ($author) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->addColumn('image', function ($members) {
                    $image = "<img style='width: 60px; height: 90px; object-fit: cover; object-position: center;'
                    src='/uploads/" . $members->image . "' alt='Photo'/>";
                    return $image;
                })
                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/sports/'.$a->id.'/edit" class="btn btn-primary mr-5 px-4 py-2" data-id="' . $a->id . '">Edit</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no','action', 'image'])->make(true);
        }

        return view('admin.sports.index');
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'type' => 'required|max:255|min:3|unique:sports,type',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:15',
        ]); 

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        
        $image->move(public_path('uploads'), $imageName);
        
        $attributes['image'] = $imageName;

        Sport::create($attributes);

        return redirect('/admin/sports')->with('success','New sport type added successfully');
    }

    public function authorDetail($id)
    {
        $author = Sport::findOrFail($id);
        return view('users.author.detail', compact('author'));
    }

    public function edit($id)
    {
        $sport = Sport::findOrFail($id);

        return view('admin.sports.edit', [
            'sport' => $sport,
        ]);
    }

    public function update(Request $request, $id)
    {
        $sport = Sport::findOrFail($id);

        if ( $sport->type != $request['type'] ) {

        $attributes = request()->validate([
            'type' => 'required|max:255|min:3|unique:sports,type',
            'description' => 'required|min:3',
        ]);

        $sport->update([
            'type' => $attributes['type'],
            'description' => $attributes['description'],
        ]);
    } else {
        $attributes = request()->validate([
            'type' => 'required|max:255|min:3',
            'description' => 'required|min:3',
        ]);

        $sport->update([
            'type' => $attributes['type'],
            'description' => $attributes['description'],
        ]);
    }
        $sport->save();

        return back()->with('success', 'Sport updated successfully');
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

        $sport = Sport::findOrFail($id);

        $sport->update([
            'image' => $attributes['image'],
        ]);

        $sport->save();

        return back()->with('success', 'Image changed successfully');
    }

    public function destroy($id)
    {
        $sport = Sport::findOrFail($id);

        $sport->delete();

        return 'success';
    }
}
