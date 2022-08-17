@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
@endsection

@section('title')
    <title>Edit a brand</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Brand', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('brands.update', ['id' => $brand->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Brand name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $brand->name }}" placeholder="Enter new brand">
                                @error('name')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
