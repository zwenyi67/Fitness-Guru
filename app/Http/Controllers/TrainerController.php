<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMessage;
use App\Models\TrainerMessage;
use App\Models\TrainerReview;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TrainerController extends Controller
{
    // Member Section end

    public function request(Request $request)
    {
        if ($request->ajax()) {
            $trainers = User::where('status', 1)->where('pending_status', 0)->latest()->get();

            return DataTables::of($trainers)

                ->addColumn('no', function ($trainers) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->addColumn('image', function ($trainers) {
                    $image = "<img style='width: 90px; height: 90px; object-fit: cover; object-position: center;  border-radius: 50%;'
                    src='/storage/uploads/" . $trainers->image . "' alt='Photo'/>";
                    return $image;
                })
                ->editColumn('specialization', function ($trainers) {
                    return $trainers->sport->type;
                })
                
                ->editColumn('name', function ($trainers) {
                    return $trainers->first_name. ' '. $trainers->last_name;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/trainers/'.$a->id.'/detail" class="btn btn-primary mr-5 px-4 py-2">Detail</a>';
                    $approve = '<a href="" class="changeButton btn btn-success mr-5 px-3 py-2" data-id="' . $a->id . '">Approve</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail .$approve . $delete . '</div>';
                })->rawColumns(['no','action', 'image'])->make(true);
        }

        return view('admin.trainers.request');
    }

    public function approve(Request $request)
    {
        if ($request->ajax()) {
            $trainers = User::where('status', 1)->where('pending_status', 1)->latest()->get();

            return DataTables::of($trainers)

                ->addColumn('no', function ($trainers) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->editColumn('specialization', function ($trainers) {
                    return $trainers->sport->type;
                })
                ->editColumn('name', function ($trainers) {
                    return $trainers->first_name. ' '. $trainers->last_name;
                })
                ->addColumn('image', function ($trainers) {
                    $image = "<img style='width: 90px; height: 90px; object-fit: cover; object-position: center;
                    border-radius: 50%; '
                    src='/storage/uploads/" . $trainers->image . "' alt='Photo'/>";
                    return $image;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/trainers/' .$a->id. '/detail" class="btn btn-primary mr-5 px-4 py-2"data-id="' . $a->id .  '" >Detail</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail . $delete . '</div>';
                })->rawColumns(['no','action', 'image'])->make(true);
        }

        return view('admin.trainers.approve');
    }

    public function approved($id) {

        $trainer = User::findOrFail($id);

        $trainer->update([
            'pending_status' => 1,
        ]);
        $trainer->save();
        
        return 'success';
    }

    public function show($id) {

        return view('admin.trainers.detail',[
            'trainer' => User::findOrFail($id),
        ]);
    }

    public function dashboard($id) {
        $trainer = User::findOrFail($id);
        

        return view('user.trainers.dashboard', [
            'courses' => Course::where('trainer_id', $id)->latest()->get(),
            'messages' => TrainerMessage::where('trainer_id', $id)->latest()->get(),
        ]);
    }

    // User interface section

    public function trainerDetail($id) {

        $trainer = User::findOrFail($id);

        return view('user.trainers.detail',[
            'trainer' => $trainer,
            'courses' => Course::where('trainer_id', $id)->latest()->get(),
            'reviews' => TrainerReview::where('trainer_id', $trainer->id)->latest()->get(),
            'five' => TrainerReview::where('trainer_id', $trainer->id)->where('rating', 5)->count(),
            'four' => TrainerReview::where('trainer_id', $trainer->id)->where('rating', 4)->count(),
            'three' => TrainerReview::where('trainer_id', $trainer->id)->where('rating', 3)->count(),
            'two' => TrainerReview::where('trainer_id', $trainer->id)->where('rating', 2)->count(),
            'one' => TrainerReview::where('trainer_id', $trainer->id)->where('rating', 1)->count(),
            'initialQuantity' => 1,
        ]);
    }

    public function sendMessage(Request $request, $id)
{
    $attributes = $request->validate([
        'name' => 'required|max:255|min:3',
        'email' => 'required',
        'phone' => 'required|numeric|integer|min:1|not_in:0',
        'message' => 'required|min:3',
    ]);

    $attributes['trainer_id'] = $id;

    TrainerMessage::create($attributes);

    return back()->with('success', 'Send Message Successfully');
}

public function download($filename)
{
    
        $filePath = storage_path('app/public/uploads/' . $filename);

        if (!Storage::exists("public/uploads/{$filename}")) {
            abort(404); // Or handle the case when the file is not found
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/octet-stream', // Adjust the content type based on your file type
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    
}

public function destroy($id)

{
    $trainer = User::findOrFail($id);
    
    $trainer->delete();

    return 'success';

}

    
}
