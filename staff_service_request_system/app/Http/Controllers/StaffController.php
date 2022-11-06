<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Item;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Author;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::User()->designation !='Admin'){
            return redirect('/leaves');
        }
        $records = User::all();
        return view('admin', ['records' => $records]);
    }
    public function profile()
    {
        //
        $records = User::findOrFail(Auth::User()->id);
        return view('profile', ['records' => $records]);
    }
    public function login()
    {
        //
        return view('login');
    }

    public function adduser(Request $request)
    {

        try {
            // Validate the value...
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->department = $request->input('department');
            $user->phone = $request->input('phone');
            $user->designation = $request->input('designation');
            $user->save();

            return response()->json(['success' => 'User Saved']);
        }

        //code...
        catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th]);
        }
    }
    public function getuser($id)
    {
        $dataById = User::findOrFail($id);
        return response()->json($dataById);
    }

    public function getNotifs()
    {
        $finalCount = 0;

        if (Auth::User()->designation == 'Admin') {
            try {
                $leaves = Leave::where('is_approved', '=', 0)->get()->count();
                $items = Item::where('is_approved', '=', 0)->get()->count();
                $finalCount = $leaves + $items;
            }

            //code...
            catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error' => $th]);
            }
        } else {
            try {
                $leaves = Leave::where('is_approved', '=', 0)->where('created_by', '=', Auth::User()->email)->get()->count();
                $items = Item::where('is_approved', '=', 0)->where('created_by', '=', Auth::User()->email)->get()->count();
                $finalCount = $leaves + $items;
            }

            //code...
            catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error' => $th]);
            }
        }

        return response()->json($finalCount);
    }

    public function create()
    {
        //
    }


    public function store(StoreStaffRequest $request)
    {
        //
    }


    public function show(Staff $staff)
    {
        //

    }


    public function edit(Staff $staff)
    {
        //
    }


    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        //
    }

    public function destroy(Staff $staff)
    {
        //
    }
}
