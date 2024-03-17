<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    // Members Section start
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $members = User::where('status', 0)->where('pending_status', 0)->latest()->get();

            return DataTables::of($members)

                ->addColumn('no', function ($members) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                ->editColumn('birth_date', function ($members) {
                    return Carbon::parse($members->birth_date)->age.' years';
                })
                ->editColumn('name', function ($members) {
                    return $members->first_name. ' '. $members->last_name;
                })
                ->addColumn('image', function ($members) {
                    $image = "<img style='width: 90px; height: 90px; object-fit: cover; object-position: center;
                    border-radius: 50%; '
                    src='/uploads/" . $members->image . "' alt='Photo'/>";
                    return $image;
                })
                ->addColumn('action', function ($a) {

                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $delete . '</div>';
                })->rawColumns(['no','action', 'image'])->make(true);
        }

        return view('admin.members.index');
    }

    public function approved($id) {

        $member = User::findOrFail($id);

        $member->update([
            'pending_status' => 1,
        ]);
        $member->save();
        
        return 'success';
    }

    public function show($id) {

        return view('admin.members.detail',[
            'trainer' => User::findOrFail($id),
        ]);
    }

    public function destroy($id)

{
    $user = User::findOrFail($id);
    
    $user->delete();

    return 'success';

}
}
