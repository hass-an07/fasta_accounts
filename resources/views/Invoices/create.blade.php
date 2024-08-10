@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Invoice</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('invoices.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- Display validation errors --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    <option value="">--select--</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id')==$customer->id ?
                                        'selected' : '' }}>
                                        {{ $customer->first_name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('customer_id')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" value="{{ old('invoice_number') }}" name="invoice_number"
                                    id="invoice_number" class="form-control" placeholder="Invoice Number">
                                <span class="text-danger">
                                    @error('invoice_number')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">--select--</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('product_id')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bank">Bank</label>
                                <select name="bank" id="bank" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="coh" {{ old('bank')=='coh' ? 'selected' : '' }}>Cash On Hand</option>
                                    <option value="mcb" {{ old('bank')=='mcb' ? 'selected' : '' }}>MCB</option>
                                    <option value="alflah" {{ old('bank')=='alflah' ? 'selected' : '' }}>Alflah</option>
                                    <option value="allied" {{ old('bank')=='allied' ? 'selected' : '' }}>Allied</option>
                                </select>
                                <span class="text-danger">
                                    @error('bank')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="account_number">Account Number</label>
                                <input type="text" value="{{ old('account_number') }}" name="account_number"
                                    id="account_number" class="form-control" placeholder="Account Number">
                                <span class="text-danger">
                                    @error('account_number')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="payment_mode">Payment Mode</label>
                                <select name="payment_mode" id="payment_mode" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="cash" {{ old('payment_mode')=='cash' ? 'selected' : '' }}>Cash
                                    </option>
                                    <option value="cheque" {{ old('payment_mode')=='cheque' ? 'selected' : '' }}>Cheque
                                    </option>
                                    <option value="credit_card" {{ old('payment_mode')=='credit_card' ? 'selected' : ''
                                        }}>Credit Card</option>
                                    <option value="offset" {{ old('payment_mode')=='offset' ? 'selected' : '' }}>Offset
                                    </option>
                                    <option value="online" {{ old('payment_mode')=='online' ? 'selected' : '' }}>Online
                                    </option>
                                </select>
                                <span class="text-danger">
                                    @error('payment_mode')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ref_no">Ref No</label>
                                <input type="text" value="{{ old('ref_no') }}" name="ref_no" id="ref_no"
                                    class="form-control" placeholder="Ref No">
                                <span class="text-danger">
                                    @error('ref_no')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mailing_address">Mailing Address</label>
                                <input type="text" value="{{ old('mailing_address') }}" name="mailing_address"
                                    id="mailing_address" class="form-control" placeholder="Mailing Address">
                                <span class="text-danger">
                                    @error('mailing_address')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date">Date</label>
                                <input type="date" value="{{ old('date') }}" name="date" id="date" class="form-control">
                                <span class="text-danger">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="amount">Amount</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" id="amount"
                                    class="form-control" placeholder="Amount">
                                <span class="text-danger">
                                    @error('amount')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3 mx-3">
                <button class="btn btn-primary" type="submit">Create</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection

@section('customjs')
{{-- Uncomment if you need Dropzone.js or any other custom JS --}}
{{-- <script>
    Dropzone.autoDiscover = false;    
    const dropzone = $("#image").dropzone({ 
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url:  "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }, 
        success: function(file, response){
            $("#image_id").val(response.image_id);
            //console.log(response)
        }
    });
</script> --}}
@endsection