<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use App\Http\Resources\serviceResource;
use DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=service::paginate(10);
         return serviceResource::collection($service);
        
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
             'service'=>'required',
        ]);
        $NewService= new service([
            'service'=>$request->input('service'),
        ]);

        if ($NewService->save()) {
            
            return new serviceResource($NewService);
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
        $showservice=service::findOrfail($id);
          return new serviceResource($showservice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editservice=service::findOrfail($id);
          return new serviceResource($editservice);
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
             'service'=>'required',
        ]);

         //updating service
        $service = service::findOrfail($id);
        $service->service =$request->input('service');

        if ($service->save()) {
            
            return new serviceResource($service);
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
         $delPolicy=service::findOrfail($id);
         

         if ($delPolicy->delete()) {
             
             return new serviceResource($delPolicy);
         }
    }
}
