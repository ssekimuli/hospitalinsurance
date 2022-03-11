<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\Pateints;
use App\Http\Resources\transactionResource;
use DB;

class transactionsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tracsaction = transactions::with('Pateints')->paginate(20);

        return transactionResource::collection($Tracsaction);
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
            'Date_paid'=>'required',
            'Amount'=>'required',
            'pateints_id'=>'required',
        ]);

        $pateintTransact= new transactions([
            'Date_paid'=>$request->input('Date_paid'),
            'Amount'=>$request->input('Amount'),
            'pateints_id'=>$request->input('pateints_id'),
        ]);
        if ($pateintTransact->save()) {
            
            return new transactionResource($pateintTransact);
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
       $showTransaction=transactions::find($id);
          return new transactionResource($showTransaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editTracsaction=transactions::find($id);
          return new transactionResource($editTracsaction);
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
            'Date_paid'=>'required',
            'Amount'=>'required',
            'pateints_id'=>'required',
        ]);
     
        $updateTransaction = transactions::findOrfail($id);
        $updateTransaction->Date_paid = $request->input('Date_paid');
        $updateTransaction->Amount  =$request->input('Amount');
        $updateTransaction->pateints_id = $request->input('pateints_id');

        if ( $updateTransaction->save()) {
            
            return new transactionResource($updateTransaction);
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
       $deltansact=transactions::find($id);
       if ($deltansact->delete()) {
            
            return new transactionResource($deltansact);
         }
    }
}
