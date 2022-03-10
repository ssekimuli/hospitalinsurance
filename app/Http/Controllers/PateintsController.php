<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pateints;
use App\Http\Resources\pateintResource;
use DB;

class PateintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list pateints
        $pateints = Pateints::paginate(10);

        //return collection resource
        return pateintResource::collection($pateints);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'gender'=>'required',
            'DoB'=>'required',
            'address'=>'required',
            'Email'=>'required',
        ]);
         //add new pateint
        $Pateints= new Pateints([
            'Fname'=>$request->input('Fname'),
            'Lname'=>$request->input('Lname'),
            'gender'=>$request->input('gender'),
            'DoB'=>$request->input('DoB'),
            'address'=>$request->input('address'),
            'Email'=>$request->input('Email'),
        ]);
        if ($Pateints->save()) {
            return new pateintResource($Pateints);
        }

         }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get single pateint
         $aPateint=Pateints::findOrfail($id);

          //return single resource
         return new pateintResource($aPateint);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
           'Fname'=>'required',
            'Lname'=>'required',
            'gender'=>'required',
            'DoB'=>'required',
            'address'=>'required',
            'Email'=>'required',
        ]);
       //update pateints
            $pateint=Pateints::findOrfail($id);
            $pateint->Fname = $request->input('Fname');
            $pateint->Lname = $request->input('Lname');
            $pateint->gender = $request->input('gender');
            $pateint->DoB = $request->input('DoB');
            $pateint->address = $request->input('address');
            $pateint->Email = $request->input('Email');
            
         if ($pateint->save()) {
            return new pateintResource($pateint);

         }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delPateints=Pateints::find($id);
         
       if ($delPateints->delete()) {
             return new pateintResource($delPateints);
         }
          
    }
}
