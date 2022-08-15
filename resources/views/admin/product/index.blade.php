@extends('layouts.admin')

@section('title')
    <title>Product List</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add new
                            Product</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($categories as $category) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <th scope="row">iPhone 13</th>
                                        <th scope="row">24.000.000</th>
                                        <th scope="row">
                                            <img src="" alt="">
                                        </th>
                                        <td>Mobile phone</td>
                                        <td>Apple</td></td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-default">Edit</a>
                                            <a href=" #"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $categories->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
