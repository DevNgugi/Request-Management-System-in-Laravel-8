<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = Item::all();
        return view('items', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getitem($id)
    {
        $dataById= Item::findOrFail($id); 
        return response()->json($dataById);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            // Validate the value...
            $item=new Item();
                $item->name = $request->input('name');
                $item->quantity = $request->input('quantity');
                $item->is_read = 0;
                $item->is_approved = 0;
                $item->created_by = Auth::User()->email;
                $item->save();
    
            return response()->json(['success'=>'Item Saved' ]);    
        } 
        
          //code...
       catch (\Throwable $th) {
           //throw $th;
           return response()->json(['error'=>$th ]);
       }  
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function requestAction(Request $request, $id)
    {
        //
        $dataById= Item::findOrFail($id); 
        if($request->choice == 0){
            $dataById->is_approved=2;
            try {
            $dataById->save();
            }catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error'=>$th ]);
            }  
            return response()->json(['success'=>'Updated successfully' ]);    
             
        }
        
        elseif($request->choice == 1){
            $dataById->is_approved=1;
            try {
            $dataById->save();
            }catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error'=>$th ]);
            }  
            return response()->json(['success'=>'Updated successfully' ]);     
               

        }
        
        return response()->json(['error'=>'some error occured' ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
