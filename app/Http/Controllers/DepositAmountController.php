<?php

namespace App\Http\Controllers;

use App\Models\DepositAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;

class DepositAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $amount = DepositAmount::all();
        return view('Deposit.DepositAmount',compact('amount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DepositAmount $depositAmount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
         $amount =DepositAmount::find($id);
        return view('Deposit.EditDepositAmount',compact('amount'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'DepositeAmount' => 'required',
        'DepositePurpose' => 'required',
        'DepositAmountDollar' => 'required',
        'PaymentReciept' => 'required',
        'TransactionID' => 'required',
        'Status' => 'required',
       
    ]);

    if ($validator->passes()) {
        $amount = DepositAmount::find($id);
        $amount->DepositeAmount = $request->DepositeAmount;
        $amount->DepositePurpose = $request->DepositePurpose;
        $amount->DepositAmountDollar = $request->DepositAmountDollar;
        $amount->PaymentReciept = $request->PaymentReciept;
        $amount->TransactionID = $request->TransactionID;
        $amount->Status = $request->Status;

           if ($request->PaymentReciept) {
            $PaymentReciept = $amount->PaymentReciept;
            $ext = $request->PaymentReciept->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->PaymentReciept->move(public_path().'/Pay/payments/',$newFileName); // This will save file in a folder
            
            $amount->PaymentReciept = $newFileName;
            $amount->save();
            File::delete(public_path().'/Pay/payments/'.$PaymentReciept);
        }
        $amount->save();

        // Upload Image logic if needed

        return redirect()->to('/DepositAmount');
    } else {
        return redirect()->to("/EditDepositAmount/$id")->withErrors($validator)->withInput();
    }
}



/*

     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
            $pupose = DepositAmount::findOrFail($id);
      
        $pupose->delete();
   
           return redirect()->to('DepositAmount');
    }
}
