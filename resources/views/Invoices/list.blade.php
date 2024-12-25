@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Invoices</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('invoices.create') }}" class="btn btn-primary">New Invoice</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <form action="{{route('invoices.index')}}" method="get"> 
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" onclick="window.location.href='{{ route('invoices.index') }}'" class="btn btn-primary">Reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group" style="width: 250px;">
                        <input type="text" value="{{ request()->get('keyword') }}" name="keyword" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Date</th>
                            <th>Invoice Number</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Mailing Address</th>
                            <th>Bank</th>
                            <th>Acc no</th>
                            <th width="100">Print</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($invoices->isNotEmpty())
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->customer_name ?? 'N/A' }}</td>
                                <td>{{ $invoice->products->name ?? 'N/A' }}</td>
                                <td>{{ $invoice->mailing_address }}</td>
                                <td>{{ $invoice->bank }}</td>
                                <td>{{ $invoice->account_number }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('invoices.print',$invoice->id)}}">Print</a>
                                </td>
                                <td>
                                    <a href="#">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg></a>                   
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger w-4 h-4 mr-1 border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete this invoice?');">
                                                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                            </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="8" class="text-danger text-center"><h1>No Records Found</h1></td>
                        </tr>
                        @endif
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{ $invoices->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection

@section('customjs')
<script>
    console.log('Invoice management page loaded.');
</script>
@endsection
