@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}" />
@endsection


@section('js')
    <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection



@section('title')
    <title>Edit Role</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Show role --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Role name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter role name" value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="display_name" class="form-control" rows="4"> {{ $role->display_name }} </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="col-md-12">
                                <input type="checkbox" class="checkedall">
                                <label>Check all</label>
                            </div>

                            <div class="row">

                                @foreach ($permissionParent as $permissionParentItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            {{ $permissionParentItem->name }} Module
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionParentItem->permissionChildren as $permissionChildrenItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                {{ $permissionChecked->contains('id', $permissionChildrenItem->id) ? 'checked' : '' }}
                                                                class="checkbox_children"
                                                                value="{{ $permissionChildrenItem->id }}">
                                                        </label>
                                                        {{ $permissionChildrenItem->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

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
