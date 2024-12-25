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
            @if ($errors->any())
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
                                    <label for="customer_name">Customer name</label>
                                    <input type="text" value="{{ old('customer_name') }}" name="customer_name"
                                        id="customer_name" class="form-control" placeholder="Customer Name">
                                    <span class="text-danger">
                                        @error('customer_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_email">Customer Email</label>
                                    <input type="text" value="{{ old('customer_email') }}" name="customer_email"
                                        id="customer_email" class="form-control" placeholder="Customer Email">
                                    <span class="text-danger">
                                        @error('customer_email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_cnic">Customer Cnic</label>
                                    <input type="text" value="{{ old('customer_cnic') }}" name="customer_cnic"
                                        id="customer_cnic" class="form-control" placeholder="Customer Cnic">
                                    <span class="text-danger">
                                        @error('customer_cnic')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_number">Customer Number</label>
                                    <input type="text" value="{{ old('customer_number') }}" name="customer_number"
                                        id="customer_number" class="form-control" placeholder="Customer Number">
                                    <span class="text-danger">
                                        @error('customer_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mailing_address">Customer Address</label>
                                    <input type="text" value="{{ old('mailing_address') }}" name="mailing_address"
                                        id="mailing_address" class="form-control" placeholder="Customer Address">
                                    <span class="text-danger">
                                        @error('mailing_address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_id">CRO </label>
                                    <select name="cro_id" id="cro" class="form-control select2">
                                        <option value="">--select--</option>
                                        @foreach ($cros as $cro)
                                            <option value="{{ $cro->id }}"
                                                {{ old('cro_id') == $cro->id ? 'selected' : '' }}>
                                                {{ $cro->first_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('cro_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_id">Joined By </label>
                                    <select name="joined_id" id="joined_by" class="form-control select2">
                                        <option value="">--select--</option>
                                        @foreach ($members as $cro)
                                            <option value="{{ $cro->id }}"
                                                {{ old('joined_id') == $cro->id ? 'selected' : '' }}>
                                                {{ $cro->first_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('joined_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_id">Trainer </label>
                                    <select name="trainer_id" id="trainer_id" class="form-control select2">
                                        <option value="">--select--</option>
                                        @foreach ($trainers as $cro)
                                            <option value="{{ $cro->id }}"
                                                {{ old('trainer_id') == $cro->id ? 'selected' : '' }}>
                                                {{ $cro->first_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('trainer_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="user_id">User Id</label>
                                    <input type="text" value="{{ old('user_id') }}" name="user_id" id="user_id"
                                        class="form-control" placeholder="User id">
                                    <span class="text-danger">
                                        @error('user_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
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
                        </div> --}}

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

                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label for="bank">Bank</label>-->
                            <!--        <select name="bank" id="bank" class="form-control">-->
                            <!--            <option value="">--select--</option>-->
                            <!--            <option value="coh" {{ old('bank') == 'coh' ? 'selected' : '' }}>Cash On Hand</option>-->
                            <!--            <option value="mcb" {{ old('bank') == 'mcb' ? 'selected' : '' }}>MCB</option>-->
                            <!--            <option value="alflah" {{ old('bank') == 'alflah' ? 'selected' : '' }}>Alflah</option>-->
                            <!--            <option value="allied" {{ old('bank') == 'allied' ? 'selected' : '' }}>Allied</option>-->
                            <!--        </select>-->
                            <!--        <span class="text-danger">-->
                            <!--            @error('bank')
        -->
                                <!--            {{ $message }}-->
                                <!--
    @enderror-->
                            <!--        </span>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label for="account_number">Account Number</label>-->
                            <!--        <input type="text" value="{{ old('account_number') }}" name="account_number"-->
                            <!--            id="account_number" class="form-control" placeholder="Account Number">-->
                            <!--        <span class="text-danger">-->
                            <!--            @error('account_number')
        -->
                                <!--            {{ $message }}-->
                                <!--
    @enderror-->
                            <!--        </span>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment_mode">Payment Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                        <option value="">--select--</option>
                                        <option value="cash" {{ old('payment_mode') == 'cash' ? 'selected' : '' }}>Cash
                                        </option>
                                        <option value="cheque" {{ old('payment_mode') == 'cheque' ? 'selected' : '' }}>
                                            Cheque
                                        </option>
                                        <option value="credit_card"
                                            {{ old('payment_mode') == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                        <option value="offset" {{ old('payment_mode') == 'offset' ? 'selected' : '' }}>
                                            Offset
                                        </option>
                                        <option value="online" {{ old('payment_mode') == 'online' ? 'selected' : '' }}
                                            selected>Online
                                        </option>
                                    </select>
                                    <span class="text-danger">
                                        @error('payment_mode')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label for="ref_no">Ref No</label>-->
                            <!--        <input type="text" value="{{ old('ref_no') }}" name="ref_no" id="ref_no"-->
                            <!--            class="form-control" placeholder="Ref No">-->
                            <!--        <span class="text-danger">-->
                            <!--            @error('ref_no')
        -->
                                <!--            {{ $message }}-->
                                <!--
    @enderror-->
                            <!--        </span>-->
                            <!--    </div>-->
                            <!--</div>-->


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date">Date</label>
                                    <input type="date" value="{{ old('date', date('Y-m-d')) }}" name="date"
                                        id="date" class="form-control">
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
                    <button class="btn btn-primary" type="submit">Print</button>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customjs')
    <script>
        $(document).ready(function() {
            // Initialize Select2 on all select elements with the 'select2' class
            $('#cro, #joined_by, #trainer_id').select2({
                placeholder: '{{ __('Select') }}',
                allowClear: true,
                tags: true
            });

        });
    </script>
@endsection
