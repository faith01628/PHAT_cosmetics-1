@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/permission/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('admins/permission/add/add.js') }}"></script>
@endsection


@section('title')
    <title>Create new Permission</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Permission', 'key' => 'Create'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Select Module</label>

                                <select class="form-control" name="module_parent">
                                    <option value="">Select Module</option>
                                    @foreach (config('permissions.table_module') as $moduleItem)
                                        <option option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">

                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="checkedall">
                                            <label>Check all</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @foreach (config('permissions.module_children') as $moduleChild)
                                            <div class="col-md-3">
                                                <label for="">
                                                    <input type="checkbox" value="{{ $moduleChild }}"
                                                        name="module_child[]" class="checkbox_wrapper">
                                                    {{ $moduleChild }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
