<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\policies;
use App\Http\Resources\policyResource;
use DB;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Policy=policies::paginate(20);

       return policyResource::collection($Policy);
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
            'policy'=>'required',
            'pateints_id'=>'required',
            'Company_ID'=>'required',
            'start_Date'=>'required',
            'End_Date'=>'required',
            'deducted_amount'=>'required',
        ]);
         //saving new policy
        $newPolicy= new policies([
            'policy'=>$request->input('policy'),
            'pateints_id'=>$request->input('pateints_id'),
            'Company_ID'=>$request->input('Company_ID'),
            'start_Date'=>$request->input('start_Date'),
            'End_Date'=>$request->input('End_Date'),
            'deducted_amount'=>$request->input('deducted_amount'),
        ]);
            if ($newPolicy->save()) {
                return new policyResource($newPolicy);
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
        $aPolicy=policies::find($id);
         return new policyResource($aPolicy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPolicy=policies::findOrfail($id);
         return new policyResource($editPolicy);
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
            'Company_ID'=>'required',
            'start_Date'=>'required',
            'End_Date'=>'required',
            'deducted_amount'=>'required',
        ]);
        $affectedpolicy = DB::table('policies')->where('id', $id)->update([
                'pateints_id'=>$request->input('pateints_id'),
                'Company_ID'=>$request->input('Company_ID'),
                'start_Date'=>$request->input('start_Date'),
                'End_Date'=>$request->input('End_Date'),
                 'deducted_amount'=>$request->input('deducted_amount'),
              ]);
         //updateing policy
        $policy=policies::findOrfail($id);
        $policy->policy =$request->input('policy');
        $policy->pateints_id =$request->input('pateints_id');
        $policy->Company_ID =$request->input('Company_ID');
        $policy->start_Date =$request->input('start_Date');
        $policy->End_Date =$request->input('End_Date');
        $policy->deducted_amount =$request->input('deducted_amount');

        if ($policy->save()) {
          
           return new policyResource($policy);
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
       $delPolicy=policies::find($id);
               
        if ($delPolicy->delete()) {
            return new policyResource($delPolicy);
        }
    }
}
