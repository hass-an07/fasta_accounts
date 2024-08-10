<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::query()->with('products','customer')->paginate(10);
        // dd($invoices);
        return view('Invoices.list',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('Invoices.create', compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'created_by' => 'required',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'customer_id' => 'required|exists:customers,id',
            'mailing_address' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'date' => 'required|date',
            'account_number' => 'min:10',
            'product_id' => 'required',
            'amount' => 'required|numeric|between:0,999999.99',
            'payment_mode' => 'nullable|string|max:255',
            'ref_no' => 'nullable|string|max:255',
        ],[
            'customer_id.required' => 'plz select a customer.',
            'product_id.required' => 'plz select a product.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $invoice = new Invoice();
        $invoice->created_by = $request->created_by;
        $invoice->customer_id = $request->customer_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->mailing_address = $request->mailing_address;
        $invoice->bank = $request->bank;
        $invoice->date = $request->date;
        $invoice->amount = $request->amount;
        $invoice->product_id  = $request->product_id;
        $invoice->account_number = $request->account_number;
        $invoice->payment_mode = $request->payment_mode;
        $invoice->ref_no = $request->ref_no;
        $invoice->save();
        return redirect()->route('invoices.index');
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
        //
    }
    public function print($id)
{
    $invoice = Invoice::with('user','products','customer')->findOrFail($id);
    return view('Invoices.print', compact('invoice'));
}
}
