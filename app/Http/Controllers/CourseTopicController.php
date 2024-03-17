<?php

namespace App\Http\Controllers;

use App\Models\CourseTopic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseTopicController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $course = CourseTopic::latest()->get();

            return DataTables::of($course)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/topics/' .$a->id. '/edit" class="btn btn-primary mr-5 px-4 py-2"data-id="' . $a->id .  '" >Edit</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no','action', 'image', 'trainer'])->make(true);
        }

        return view('admin.topics.index');
    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:course_topics,name',
        ]); 

        CourseTopic::create($attributes);

        return redirect('/admin/topics')->with('success','New Topic added successfully');
    }

    public function edit($id)
    {
        $topic= CourseTopic::findOrFail($id);

        return view('admin.topics.edit', [
            'topic' => $topic,
        ]);
    }

    public function update(Request $request, $id)
    {
        $topic = CourseTopic::findOrFail($id);

        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:course_topics,name',
        ]);

        $topic->update([
            'name' => $attributes['name'],
        ]);
        $topic->save();

        return redirect('/admin/topics')->with('success', 'Topic updated successfully');
    }

    public function destroy($id)
    {
        $topic = CourseTopic::findOrFail($id);

        $topic->delete();

        return 'success';
    }
}
