@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Member Invoice</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('memberInvoice.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        {{-- @if($errors->all())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $eror)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif --}}
        <form action="{{ route('memberInvoice.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('mesage')
                        <input type="hidden" name="created_by" value="{{Auth::user()->id}}" id="">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date">Date</label>
                                <input type="date" value="{{old('date')}}" name="date" id="date" class="form-control"
                                    placeholder="Company Name">
                                <span class="text-danger">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cro">CRO </label>
                                <select name="member" id="cro" class="form-control select2">
                                    <option value="">--select--</option>
                                    @foreach ($cros as $cro)
                                        <option value="{{ $cro->first_name }}" >
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
                                <label for="joined_by">Joined By </label>
                                <select name="member" id="joined_by" class="form-control select2">
                                    <option value="">--select--</option>
                                    @foreach ($members as $cro)
                                        <option value="{{ $cro->first_name }}">
                                            {{ $cro->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('member_id')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="trainer_id">Trainer </label>
                                <select name="member" id="trainer_id" class="form-control select2">
                                    <option value="">--select--</option>
                                    @foreach ($trainers as $cro)
                                        <option value="{{ $cro->first_name }}">
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
                                <label for="amount">Amount</label>
                                <input type="text" value="{{old('amount')}}" name="amount" id="amount" class="form-control"
                                    placeholder="amount">
                                <span class="text-danger">
                                    @error('amount')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <input type="text" value="{{old('description')}}" name="description" id="description" class="form-control"
                                    placeholder="description">
                                <span class="text-danger">
                                    @error('description')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3 mx-3">
                <button class="btn btn-primary" name="submit">Create</button>
                <a href="{{route('cro.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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

        @section('customjs')
    <script>
        $(document).ready(function () {
            // When one select box is changed, disable the other two
            $('#cro').change(function () {
                if ($(this).val()) {
                    $('#joined_by').prop('disabled', true);
                    $('#trainer_id').prop('disabled', true);
                } else {
                    $('#joined_by').prop('disabled', false);
                    $('#trainer_id').prop('disabled', false);
                }
            });

            $('#joined_by').change(function () {
                if ($(this).val()) {
                    $('#cro').prop('disabled', true);
                    $('#trainer_id').prop('disabled', true);
                } else {
                    $('#cro').prop('disabled', false);
                    $('#trainer_id').prop('disabled', false);
                }
            });

            $('#trainer_id').change(function () {
                if ($(this).val()) {
                    $('#cro').prop('disabled', true);
                    $('#joined_by').prop('disabled', true);
                } else {
                    $('#cro').prop('disabled', false);
                    $('#joined_by').prop('disabled', false);
                }
            });
        });
    </script>
@endsection

</script>
@endsection