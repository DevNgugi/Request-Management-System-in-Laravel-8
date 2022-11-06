<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = Leave::all();
        return view('leaves', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getleave($id)
    {
        $dataById = Leave::findOrFail($id);
        return response()->json($dataById);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            // Validate the value...
            $leave = new Leave();

            if (($request->input('type')) == 'Annual') {
                // get previous days this year
                $items = Leave::where(DB::raw('YEAR(created_at)'), '=', now()->year)->where('created_by','=',Auth::User()->email)->where('type','=','Annual')->get();
                $data = 0;
                foreach ($items as $item) {
                    $data += $item->days;
                }
                if ($data == 30) {
                    return response()->json(['error' => 'No Annual leave days remaining']);
                } elseif ((30 - $data) < $request->input('days')) {
                    return response()->json(['error' => 'Only ' . (30 - $data) . ' Annual leave days Remaining ']);
                }
            }
            if (($request->input('type')) == 'Maternity') {
                if ($request->input('days') > 90) {
                    return response()->json(['error' => 'Maternity Leave is 90 days Maximum']);
                }
            }

            if (($request->input('type')) == 'Paternity') {
                if ($request->input('days') > 14) {
                    return response()->json(['error' => 'Paternity Leave is 14 days Maximum']);
                }
            }

            $leave->type = $request->input('type');
            $leave->days = $request->input('days');
            $leave->is_read = 0;
            $leave->is_approved = 0;
            $leave->created_by = Auth::User()->email;
            $leave->save();

            return response()->json(['success' => 'Request Saved']);
        }

        //code...
        catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function requestAction(Request $request, $id)
    {
        //
        $dataById = Leave::findOrFail($id);
        if ($request->choice == 0) {
            $dataById->is_approved = 2;
            try {
                $dataById->save();
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error' => $th]);
            }
            return response()->json(['success' => 'Updated successfully']);
        } elseif ($request->choice == 1) {
            $dataById->is_approved = 1;
            try {
                $dataById->save();
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error' => $th]);
            }
            return response()->json(['success' => 'Updated successfully']);
        }

        return response()->json(['error' => 'some error occured']);
    }
    
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveRequest  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
