<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::latest()->paginate(4);
        return view('backend.customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.modal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customers)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string:20',
            'last_name' => 'required|string:25',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|nullable',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->with('toast_error', 'There was a problem');
        }
        $customers= new Customer();
        $customers->first_name=$request->get('first_name');
        $customers->last_name=$request->get('last_name');
        $customers->email=$request->get('email');
        $customers->phone=$request->get('phone');
        $customers->address=$request->get('address');
        $customers->save();

        return redirect()->back()->with('toast_success', 'Successfully Added');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->first_name                 =          $request->first_name;
        $customer->last_name       =          $request->last_name;
        $customer->email             =          $request->email;
        $customer->phone                  =          $request->phone;
        $customer->address                  =          $request->address;

    //     if ($request->hasFile('avatar')){
    //         // Delete Old Image
    //         if($customer->image) {
    //             Storage::delete($customer->avatar);
    //         }

    //         //Store Image
    //         $avatar_path = $request->file('avatar')->store('customers');

    //         $customer->avatar = $avatar_path;
    // }
    Alert::success('Updated Successfully', 'Thank you');

    if (! $customer->save()){
        return redirect()->back()->with('error', 'Sorry There is a problem in Updating the product. ');
    }
    return redirect()->route('customers.index')->with('success', 'SuccessFully Updating The Product.  ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
