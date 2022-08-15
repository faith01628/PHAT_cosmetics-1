@extends('layouts.admin')

@section('title')
    <title>Brand List</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Brand', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('brands.create') }}" class="btn btn-success float-right m-2">Add new
                            Brand</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $brand->id }}</th>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            <a href="{{ route('brands.edit', ['id' => $brand->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href=" {{ route('brands.delete', ['id' => $brand->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $brands->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
