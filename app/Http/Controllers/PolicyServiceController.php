<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\policyservice;
use App\Http\Resources\policyserviceResource;
use DB;

class PolicyServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $policyservice = policyservice::paginate(20);

         return policyserviceResource::collection($policyservice);
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
             'service_id'=>'required',
             'policy_id'=>'required',
             'price'=>'required',
        ]);
        $newPolicyservice= new policyservice([
            'service_id'=>$request->input('service_id'),
            'policy_id'=>$request->input('policy_id'),
            'price'=>$request->input('price'),
        ]);
        

        if ($newPolicyservice->save()) {
           
           return new policyserviceResource($newPolicyservice);
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
        $showPolicy=policyservice::findOrfail($id);
          return new policyserviceResource($showPolicy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $editPolicy=policyservice::findOrfail($id);
          return new policyserviceResource($editPolicy);
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
             'service_id'=>'required',
             'policy_id'=>'required',
             'price'=>'required',
        ]);
     
         $policyService=policyservice::findOrfail($id);
         $policyService->service_id =$request->input('service_id');
         $policyService->policy_id =$request->input('policy_id');
         $policyService->price =$request->input('price');
           
         if ($policyservice->save()) {
             return new policyserviceResource($policyService);
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
        $delPolicy=policyservice::find($id);
         
         if($delPolicy->delete()) {
             
             return new policyserviceResource($delPolicy);
         }
    }
}
