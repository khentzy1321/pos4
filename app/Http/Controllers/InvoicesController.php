<?php

namespace App\Http\Controllers;

use App\Models\Invoices;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class InvoicesController extends Controller
{

    public function index()
    {
        $customers = Customer::get();
        $invoices = Invoices::latest()->paginate();
        return view('backend.invoices.index')->with('customers', $customers, 'invoices', $invoices);
    }


    public function create()
    {

    }

    public function store(Request $request, Invoices $invoices)
    {

        // $validator = Validator::make($request->all(), [
        //     'customers_id' => 'required|string|min:3|max:255',
        //     'transaction_date' => 'required|string',
        //     'time' => 'required|string',
        //     'amount_due' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {

        //     return redirect()->route('invoices.index')->with('toast_error', 'Something Went Wrong');
        // }



           $customers = New Customer;
           $invoices = New Invoices;

            $invoices->customers_id = $request->customers_id;
            $invoices->transaction_date = $request->transaction_date;
            // $invoices->time = $request->time;
            $invoices->amount_due = $request->amount_due;
            $invoices->save();

            if($invoices){
                return redirect()->back()->with('toast_success', 'Created Sucessfully');

            }

    }

    public function show(Invoices $invoices)
    {
        //
    }

    public function edit(Invoices $invoices)
    {
        //
    }


    public function update(Request $request, Invoices $invoices)
    {
        //
    }


    public function destroy(Invoices $invoices)
    {
        //
    }
}
