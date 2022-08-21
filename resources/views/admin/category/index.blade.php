@extends('layouts.admin')

@section('title')
    <title>Category List</title>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetAlert2.js') }}"></script>
    <script src="{{ asset('admins/misc/delete/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('category-create')
                            <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Create new Category</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                    class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <a href{{ route('categories.delete', ['id' => $category->id]) }}
                                                    data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                    class="btn btn-danger action_delete">Delete</a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
