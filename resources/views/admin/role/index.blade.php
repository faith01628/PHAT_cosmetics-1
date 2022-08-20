@extends('layouts.admin')

@section('title')
    <title>Roles</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetAlert2.js') }}"></script>
    <script src="{{ asset('admins/misc/delete/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Create New Role</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row"> {{ $role->id }} </th>
                                        <td> {{ $role->name }} </td>
                                        <td> {{ $role->display_name }} </td>

                                        <td>
                                            <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="{{ route('roles.delete', ['id' => $role->id]) }}"
                                                data-url="{{ route('roles.delete', ['id' => $role->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
