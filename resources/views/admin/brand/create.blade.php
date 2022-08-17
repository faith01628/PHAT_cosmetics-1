@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
@endsection

@section('title')
    <title>Create new brand</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Brand', 'key' => 'Create'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Brand name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Enter a brand" value="{{ old('name') }}">
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
