<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::query()->paginate(10);
        return view('Customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required|unique:customers,business_name',
            'email' => 'required|unique:customers,email',
            'first_name' => 'required',
            'mobile' => 'required',
            'account_number' => 'min:10',
            'string',
            'size:11', // Ensure the exact length is 12
            'regex:/^\d{11}$/',
            'billing_address' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);

        if ($validator->fails()) {
            // Return back with validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new  Customer();

        $customer->business_name = $request->business_name;
        $customer->email = $request->email;
        $customer->account_number = $request->account_number;
        $customer->title = $request->title;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->phone = $request->phone;
        $customer->website = $request->website;
        $customer->billing_address = $request->billing_address;
        $customer->city = $request->city;
        $customer->province = $request->province;
        $customer->postal_code = $request->postal_code;
        $customer->country = $request->country;
        $customer->created_by = $request->created_by;

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
        }
    }
}
