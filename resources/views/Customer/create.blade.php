@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Customer</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('customer.index')}}" class="btn btn-primary">Back</a>
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
        <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('mesage')
                        <input type="hidden" name="created_by" value="{{Auth::user()->id}}" id="">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="business_name">Business Name</label>
                                <input type="text" value="{{old('business_name')}}" name="business_name" id="business_name" class="form-control"
                                    placeholder="Name">
                                <span class="text-danger">
                                    @error('business_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control"
                                    placeholder="Email">
                                <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="account_number">Account Number</label>
                                <input type="account_number" value="{{old('account_number')}}" name="account_number" id="account_number" class="form-control"
                                    placeholder="Account Number">
                                <span class="text-danger">
                                    @error('account_number')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="title" value="{{old('title')}}" name="title" id="title" class="form-control"
                                    placeholder="Title">
                                <span class="text-danger">
                                    @error('title')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name">First Name</label>
                                <input type="first_name" value="{{old('first_name')}}" name="first_name" id="first_name" class="form-control"
                                    placeholder="first name">
                                <span class="text-danger">
                                    @error('First_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="last_name" value="{{old('last_name')}}" name="last_name" id="last_name" class="form-control"
                                    placeholder="Last name">
                                <span class="text-danger">
                                    @error('last_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mobile">Mobile</label>
                                <input type="mobile" value="{{old('mobile')}}" name="mobile" id="mobile" class="form-control"
                                    placeholder="Mobile">
                                <span class="text-danger">
                                    @error('mobile')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="phone" value="{{old('phone')}}" name="phone" id="phone" class="form-control"
                                    placeholder="Phone">
                                <span class="text-danger">
                                    @error('phone')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="website">website</label>
                                <input type="website" value="{{old('website')}}" name="website" id="website" class="form-control"
                                    placeholder="Website">
                                <span class="text-danger">
                                    @error('website')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="billing_address">Billing Address</label>
                                <input type="billing_address" value="{{old('billing_address')}}" name="billing_address" id="billing_address" class="form-control"
                                    placeholder="Billing Address">
                                <span class="text-danger">
                                    @error('billing_address')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="country">country</label>
                                <input type="country" value="{{old('country')}}" name="country" id="country" class="form-control"
                                    placeholder="Country">
                                <span class="text-danger">
                                    @error('country')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="province">province</label>
                                <input type="province" value="{{old('province')}}" name="province" id="province" class="form-control"
                                    placeholder="province">
                                <span class="text-danger">
                                    @error('province')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city">city</label>
                                <input type="city" value="{{old('city')}}" name="city" id="city" class="form-control"
                                    placeholder="City">
                                <span class="text-danger">
                                    @error('city')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="postal_code">Postal code</label>
                                <input type="postal_code" value="{{old('postal_code')}}" name="postal_code" id="postal_code" class="form-control"
                                    placeholder="Postal code">
                                <span class="text-danger">
                                    @error('postal_code')
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
                <a href="{{route('customer.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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