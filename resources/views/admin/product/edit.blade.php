@extends('layouts.admin')

@section('title')
    <title>Add new Product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <form action="{{ route('products.update', ['id' =>$product->id]) }}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter new product" value="{{ $product->name }}">
                                @error('name')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" placeholder="Enter price" value="{{ $product->price }}">
                                @error('price')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Featured Image</label>
                                <input type="file" class="form-control-file" name="featured_image_path">
                                <div class="col-md-4 container_featured_image">
                                    <div class="row">
                                        <img class="featured_image" src="{{ $product->featured_image_path }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group container-product_images">
                                <label>Detail Images</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                <div class="col-md-12 featured_image_containers">
                                    <div class="row">
                                        @foreach ($product->productImages as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="product_image_details" src="{{ $productImageItem->image_path }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2_init"
                                    name="category_id">
                                    <option value="0">Select Category</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Select Brand</label>
                                <select class="form-control select3_init"
                                    name="brand_id">
                                    <option value="0">Select Brand</option>
                                    {!! $htmlBrand !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Enter product tag</label>
                                <select name="tags[]" class="form-control tags_selector" multiple="multiple">
                                    @foreach ($product->tags as $tagItem)
                                        <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product content</label>
                                <textarea name="contents" rows="5"
                                    class="form-control tinymce_editor_init @error('contents') is-invalid @enderror">{{ $product->content }}"</textarea>
                                @error('contents')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/ck5wbmfdo4p6ezf5lk0acvymsnt5h8w7697xyh2p16hv6ucv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
