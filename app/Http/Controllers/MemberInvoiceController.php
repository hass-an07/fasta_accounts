<?php

namespace App\Http\Controllers;

use App\Models\MemberInvoice;
use App\Http\Requests\StoreMemberInvoiceRequest;
use App\Http\Requests\UpdateMemberInvoiceRequest;
use App\Models\Cro;
use Illuminate\Http\Request; // This is the correct Request class for handling incoming HTTP requests

use Illuminate\Support\Facades\DB;

class MemberInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $memberInvoices = MemberInvoice::
        when($keyword, function ($query) use ($keyword) {
            $query->where('member', 'like', '%' . $keyword . '%');  // Search by invoice number
        })
        ->paginate(10);
        return view('MemberInvoice.list',compact('memberInvoices'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Cro::where('role', 'member')->get();
        $cros = Cro::where('role', 'cro')->get();
        $trainers = Cro::where('role', 'trainer')->get();
        return view('MemberInvoice.create' , compact('members', 'cros', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberInvoiceRequest $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'member' => 'nullable',
            'created_by' => 'required',
            'amount' => 'nullable',
            'description' => 'nullable|string|max:255',
        ]);

        // Create a new MemberInvoice
        $invoice = new MemberInvoice();
        $invoice->date = $validated['date'];
        $invoice->created_by = $validated['created_by'];
        $invoice->member = $validated['member'];
        $invoice->amount = $validated['amount'];
        $invoice->description = $validated['description'];

        // Save the invoice to the database
        $invoice->save();

        // Return a success response
        return $this->printOnCreate($invoice->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberInvoice $memberInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberInvoice $memberInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberInvoiceRequest $request, MemberInvoice $memberInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberInvoice $memberInvoice)
    {
        $memberInvoice->delete();
        return redirect()->route('memberInvoice.index')->with('success', 'Invoice deleted successfully');
    }

    private function printOnCreate($id)
{
    $invoice = DB::table('member_invoices')->find($id);
    return view('MemberInvoice.invoice', compact('invoice'));
}
    public function print($id)
{
    $invoice = DB::table('member_invoices')->find($id);
    return view('MemberInvoice.invoice', compact('invoice'));
}

}
