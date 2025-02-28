@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Members Invoice</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('memberInvoice.create') }}" class="btn btn-primary">Add Member Invoice</a>
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
                <form action="{{ route('memberInvoice.index') }}" method="GET">
                    <div class="card-header">
                        @include('mesage')
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{ route('memberInvoice.index') }}'"
                                class="btn btn-primary">Reset</button>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{ Request::get('keyword') }}" name="keyword"
                                    class="form-control float-right" placeholder="Search">
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
                                <th width="60">Date</th>
                                <th>Member Name</th>
                                <th>Dessciption</th>
                                <th>Amount</th>
                                <th>Print</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($memberInvoices->isNotEmpty())
                                @foreach ($memberInvoices as $item)
                                    <tr>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->member }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>
                                            <a href="{{ route('memberInvoice.print', $item->id) }}" class="btn btn-primary">Print</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('memberInvoice.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-danger w-4 h-4 mr-1 border-0 bg-transparent p-0"
                                                    onclick="return confirm('Are you sure you want to delete this invoice?');">
                                                    <svg wire:loading.remove.delay="" wire:target=""
                                                        class="filament-link-icon w-4 h-4 mr-1"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center">
                                        <h1>Rcords not found</h1>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $memberInvoices->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>

@endsection

@section('customjs')
    <script>
        console.log('hello');
    </script>
@endsection
