<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insurances;
use App\Http\Resources\insuranceResource;

class insurancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Insurance =insurances::paginate(10);

        //return collection resource insurance
        return insuranceResource::collection($Insurance);
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
             'pateints_id'=>'required',
             'policy_id'=>'required',
        ]);
        //create insurance
        $newInsurance= new insurances([
            'pateints_id'=>$request->input('pateints_id'),
            'policy_id'=>$request->input('policy_id'),
        ]);

        if ($newInsurance->save()) {
                return new insuranceResource($newInsurance);
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
        $showPatientInsurance = insurances::findOrfail($id);
          return new insuranceResource($showPatientInsurance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editPatientInsurance=insurances::findOrfail($id);
          return new insuranceResource($editPatientInsurance);
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
             'pateints_id'=>'required',
             'policy_id'=>'required',
        ]);

         //update insurance
        $insure=insurances::findOrfail($id);
        $insure->pateints_id = $request->input('pateints_id');
        $insure->policy_id = $request->input('policy_id');
        //saving
        if ($insure->save()) {
            return new insuranceResource($insure);
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
        //deleting insurance

       $delinsure=insurances::find($id);
       if ($delinsure->delete()) {
           return new insuranceResource($delinsure);
         }
          
    }
}
