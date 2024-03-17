<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMessage;
use App\Models\CourseTopic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $course = Course::where('pending_status', 0)->latest()->get();

            return DataTables::of($course)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->editColumn('birth_date', function ($course) {
                    return Carbon::parse($course->birth_date)->age.' years';
                })
                ->addColumn('image', function ($course) {
                    $image = "<img style='width: 90px; height: 90px; object-fit: cover; object-position: center;
                    border-radius: 50%; '
                    src='/uploads/" . $course->image . "' alt='Photo'/>";
                    return $image;
                })
                ->editColumn('trainer', function ($a) {
                    $trainer = "<img style='width: 90px; height: 90px; object-fit: cover; object-position: center;
                                    border-radius: 50%; '
                                    src='/uploads/" . $a->trainer->image . "' alt='Photo'/>";
                    return $trainer;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/courses/' .$a->id. '/detail" class="btn btn-primary mr-5 px-4 py-2"data-id="' . $a->id .  '" >Detail</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail . $delete . '</div>';
                })->rawColumns(['no','action', 'image', 'trainer'])->make(true);
        }

        return view('admin.courses.index');
    }

    

    public function approved($id) {

        $course = Course::findOrFail($id);

        $course->update([
            'pending_status' => 1,
        ]);
        $course->save();
        
        return 'success';
    }

    public function show($id) {

         return view('admin.courses.detail',[
            'trainer' => Course::findOrFail($id),
        ]);
     }

    public function create() {
        return view('user.trainers.create-course', [
            'categories'=> CourseTopic::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|not_in:0',
            'method'=> 'required|integer|in:1,2',
            'start_date' => 'required' ,'date', 'before_or_equal:',
            'end_date' => 'required' ,'date', 'before_or_equal:',
            'total' => 'required','numeric', 'min:5', 'max:300',
            'price' =>  'required|numeric|min:5|max:1000',
            'description' => 'required|min:15',
        ]); 

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();
        
        $image->move(public_path('uploads'), $imageName);
        
        $attributes['trainer_id'] = auth()->id();
        $attributes['topic_id'] = $attributes['category'];
        unset($attributes['category']);
        $attributes['image'] = $imageName;

        Course::create($attributes);

        return redirect('/trainer/courses')->with('success','New Course created successfully');
    }

    public function updateStatus(Request $request, $id)
    {
    $course = Course::findOrFail($id);

    $status = $request->has('status') ? 1 : 0;

    $course->update(['status' => $status]);

    return back()->with('success','Status Changed');
    }

    public function edit($id) {
        $course = Course::findOrFail($id);
        return view('user.trainers.course-edit',
             [
                'course' => Course::findOrFail($id),
             ]);
    }

    public function detail($id){
        return view('user.courses.detail',[
            'course' => Course::findOrFail($id),
            'members' => DB::table('course_member')
            ->join('users', 'course_member.member_id', '=', 'users.id')
            ->where('course_member.course_id', $id)
            ->select('users.id as member_id', 'users.name')
            ->get(),
        ]);
    }

    public function join(Request $request,$id){

        $course_id = Course::findOrFail($id);
        $member_id = auth()->id();

        $course_id->members()->attach($member_id);

        $course_id->update([
            'avail' => $course_id->avail - 1,
        ]);

       

        return redirect('/courses');
    }

    

    public function trainer_courseDetail($id)
    {
        return view('user.trainers.course-detail',[
            'course' => Course::findOrFail($id),
            'messages' => CourseMessage::where('course_id' , $id)->latest()->get(),
        ]);
    }

}
