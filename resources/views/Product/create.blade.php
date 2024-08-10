@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
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
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('mesage')
                        <input type="hidden" name="created_by" value="{{Auth::user()->id}}" id="">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control"
                                    placeholder="Name">
                                <span class="text-danger">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <input type="text" value="{{old('description')}}" name="description" id="description" class="form-control"
                                    placeholder="Description">
                                <span class="text-danger">
                                    @error('description')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="number" value="{{old('price')}}" name="price" id="price" class="form-control" placeholder="Price" step="0.01" min="0">
                                <span class="text-danger">
                                    @error('price')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sku">Sku</label>
                                <input type="text" value="{{old('sku')}}" name="sku" id="sku" class="form-control"
                                    placeholder="Sku">
                                <span class="text-danger">
                                    @error('sku')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="text-danger">
                                    @error('status')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3 mx-3">
                <button class="btn btn-primary" name="submit">Create</button>
                <a href="{{route('product.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>

        </form>

    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@section('customjs')
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
    }, success: function(file, response){
        $("#image_id").val(response.image_id);
        //console.log(response)
    }
});
</script> --}}
@endsection