<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Http\Resources\companyResource;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Company = company::paginate(10);
            return companyResource::collection($Company);
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
            'CompanyName'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
        $NewCompany= new company([
            'CompanyName'=>$request->input('CompanyName'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
        ]);

        if ($NewCompany->save()) {
           return new companyResource($NewCompany);
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
         $showCompany=company::findOrfail($id);
          return new companyResource($showCompany);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $editCompany=company::findOrfail($id);
          return companyResource($editCompany);
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
            'CompanyName'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
        //updating company
        $company = company::findOrfail($id);
        $company->CompanyName=$request->input('CompanyName');
        $company->phone=$request->input('phone');
        $company->email=$request->input('email');
        if ($company->save()) {
            return new companyResource($company);
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
         $delCompany=company::findOrfail($id);

         if ($delCompany->delete()) {
             return new companyResource($delCompany);
         }
         
    }
}
