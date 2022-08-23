@extends('layouts.admin')

@section('title')
    <title>Users</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetAlert2.js') }}"></script>
    <script src="{{ asset('admins/misc/delete/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'User', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Create User</a>
                        @endcan

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row"> {{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            @can('user-edit')
                                                <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                            @endcan

                                            @can('user-delete')
                                                <a href="{{ route('users.delete', ['id' => $user->id]) }}"
                                                    data-url="{{ route('users.delete', ['id' => $user->id]) }}"
                                                    class="btn btn-danger action_delete">Delete</a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
