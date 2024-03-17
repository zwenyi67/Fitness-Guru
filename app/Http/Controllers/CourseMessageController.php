<?php

namespace App\Http\Controllers;

use App\Models\CourseMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseMessageController extends Controller
{
    public function index($id){

        return view('user.trainers.course-message',
        [ 'messages' => CourseMessage::where('course_id' , $id)->latest()->get() ]);
    }


    public function sendMessage(Request $request, $id)
    {
    $attributes = $request->validate([
        'name' => 'required|max:255|min:3',
        'email' => 'required',
        'phone' => 'required|numeric|integer|min:1|not_in:0',
        'message' => 'required|min:3',
    ]);

    $attributes['course_id'] = $id;

    CourseMessage::create($attributes);

    return back()->with('success','Message Sended');

    }

    public function destroy($id) {
        
        $message = CourseMessage::findOrFail($id);
        $message->delete();
        
        return 'success';
    }
}
