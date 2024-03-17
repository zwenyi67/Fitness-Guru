<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $course = Region::latest()->get();

            return DataTables::of($course)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/regions/' .$a->id. '/edit" class="btn btn-primary mr-5 px-4 py-2"data-id="' . $a->id .  '" >Edit</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no','action', 'image', 'trainer'])->make(true);
        }

        return view('admin.regions.index');
    }

    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:regions,name',
        ]); 

        Region::create($attributes);

        return redirect('/admin/regions')->with('success','New Region added successfully');
    }

    public function edit($id)
    {
        $topic= Region::findOrFail($id);

        return view('admin.regions.edit', [
            'topic' => $topic,
        ]);
    }

    public function update(Request $request, $id)
    {
        $topic = Region::findOrFail($id);

        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:regions,name',
        ]);

        $topic->update([
            'name' => $attributes['name'],
        ]);
        $topic->save();

        return redirect('/admin/regions')->with('success', 'Region updated successfully');
    }

    public function destroy($id)
    {
        $topic = Region::findOrFail($id);

        $topic->delete();

        return 'success';
    }
}
