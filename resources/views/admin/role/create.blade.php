@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection


@section('title')
    <title>Create New Role</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Create'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" enctype="multipart/form-data" style="width: 100%">
                            @csrf
                            <div class="form-group">
                                <label>Role name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter role name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4"> {{ old('display_name') }}  </textarea>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">



                            
                            <div class="card border-primary mb-3 col-md-3">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" class="form-control" value="">
                                    </label>
                                    Product Module
                                </div>
                                <div class="card-body text-primary"> 
                                    <h5 class="card-title">
                                        <label>
                                            <input type="checkbox" class="form-control" value="">
                                        </label>
                                        Add Role
                                    </h5>
                                </div>



                                  
                                    
                                    
                                    <label for="">
                                        <input type="checkbox" class="form-control" value>
                                    </label>
                                    Product Module
                                    
                                        <h5 class="card-title">Role Name</h5>
                                        <label>
                                            Insert Product
                                        </label>
                                </div>
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/misc/add/add.js') }}"></script>
@endsection
