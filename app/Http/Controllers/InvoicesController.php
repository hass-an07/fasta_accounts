<?php

namespace App\Http\Controllers;

use App\Models\Cro;
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
    public function index(Request $request)
    {
        // Retrieve the search keyword from the request
        $keyword = $request->get('keyword');

        // Build the query with relationships and search conditions
        $invoices = Invoice::with('products', 'customer')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('invoice_number', 'like', '%' . $keyword . '%')  // Search by invoice number
                ->orWhere('customer_name', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Return the view with the filtered invoices
        return view('Invoices.list', compact('invoices'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
         $products = Product::query()->where('status','active')->get();
        $cros = Cro::where('role', 'cro')->latest()->get();
        $trainers = Cro::where('role', 'trainer')->latest()->get();
        $office_managment = Cro::where('role', 'office managment')->latest()->get();
        $members = Cro::where('role', 'member')->latest()->get();
        return view('Invoices.create', compact('customers', 'products', 'cros', 'trainers', 'members', 'office_managment'));
    }

    private function generateInvoiceNumber()
    {
        // Get the last created invoice
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();

        if (!$lastInvoice) {
            // No previous invoices, start with 'INV-0001'
            return 'INV-0001';
        }

        // Extract the number from the last invoice number and increment it
        $lastNumber = (int) str_replace('INV-', '', $lastInvoice->invoice_number);
        $newNumber = $lastNumber + 1;

        // Format the new invoice number
        return 'INV-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // $validator = Validator::make($request->all(), [
    //     'created_by' => 'required',
    //     'customer_name' => 'required',
    //     'customer_email' => 'nullable',
    //     'customer_cnic' => 'nullable|digits:13',
    //     'customer_number' => 'nullable|min:11',
    //     'mailing_address' => 'nullable|string|max:255',
    //     // 'bank' => 'string|max:255',
    //     'date' => 'date',
    //     'account_number' => 'nullable|min:10',
    //     'product_id' => 'required',
    //     'amount' => 'nullable|numeric|between:0,999999.99',
    //     'payment_mode' => 'nullable|string|max:255',
    //     'ref_no' => 'nullable|string|max:255',
    // ], [
    //     'customer_id.required' => 'Please select a customer.',
    //     'product_id.required' => 'Please select a product.',
    // ]);

    // if ($validator->fails()) {
    //     return redirect()->back()->withErrors($validator)->withInput();
    // }

    $invoice = new Invoice();
    $invoice->invoice_number = $this->generateInvoiceNumber();
    $invoice->created_by = $request->created_by;
    $invoice->user_id = $request->user_id;
    $invoice->customer_name = $request->customer_name;
    $invoice->customer_email = $request->customer_email;
    $invoice->customer_cnic = $request->customer_cnic;
    $invoice->customer_phone = $request->customer_number;
    $invoice->mailing_address = $request->mailing_address;
    $invoice->bank = $request->bank;
    $invoice->date = $request->date;
    $invoice->amount = $request->amount;
    $invoice->product_id = $request->product_id;
    $invoice->trainer_id = $request->trainer_id;
    $invoice->joined_id = $request->joined_id;
    $invoice->cro_id = $request->cro_id;
    // $invoice->office_managment_id = $request->office_managment_id;
    // $invoice->account_number = $request->account_number;
    $invoice->payment_mode = $request->payment_mode;
    // $invoice->ref_no = $request->ref_no;
    $invoice->save();

    // Generate and download the invoice as an image
    return $this->printOnCreate($invoice->id);
}

// private function generateInvoiceImage($invoiceId)
// {
//     $invoice = Invoice::with('user', 'products', 'customer', 'joined', 'trainer', 'cro')
//         ->findOrFail($invoiceId);

//     // Generate HTML content from the view
//     $html = view('Invoices.print', compact('invoice'))->render();

//     // Use Browsershot to generate an image
//     $imageName = 'invoice-' . $invoice->invoice_number . '.png';
//     $imagePath = storage_path('app/public/invoices/' . $imageName);

//     \Spatie\Browsershot\Browsershot::html($html)
//         ->setScreenshotType('png')
//         ->save($imagePath);

//     // Return the image for download
//     return response()->download($imagePath)->deleteFileAfterSend(true);
// }


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
    // Find the invoice by ID and delete it
    $invoice = Invoice::findOrFail($id);
    // dd($invoice);
    $invoice->delete();

    // Redirect to the invoices index route with a success message
    return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
}
    private function printOnCreate($id)
    {
        $invoice = Invoice::with('user', 'products', 'customer', 'joined', 'trainer', 'cro')->findOrFail($id);
        return view('Invoices.print', compact('invoice'));
    }
    public function print($id)
    {
        $invoice = Invoice::with('user', 'products', 'customer', 'joined', 'trainer', 'cro')->findOrFail($id);
        return view('Invoices.print', compact('invoice'));
    }
}
