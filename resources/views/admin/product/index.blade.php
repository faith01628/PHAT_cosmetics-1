@extends('layouts.admin')

@section('title')
    <title>Product List</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetAlert2.js') }}"></script>
    <script src="{{ asset('admins/misc/delete/delete.js') }}"></script>
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
                                @foreach ($products as $productItem)
                                    <tr>
                                        <th>{{ $productItem->id }}</th>
                                        <th>{{ $productItem->name }}</th>
                                        <th>{{ $productItem->price }}</th>
                                        <th>
                                            <img class="product_images_150_150"
                                                src="{{ $productItem->featured_image_path }}" alt="">
                                        </th>
                                        <td> {{ $productItem->category->name }}</td>
                                        <td> {{ $productItem->brand->name }}</td>
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', ['id' => $productItem->id]) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href=" {{ route('products.delete', ['id' => $productItem->id]) }}"
                                                data-url="{{ route('products.delete', ['id' => $productItem->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
