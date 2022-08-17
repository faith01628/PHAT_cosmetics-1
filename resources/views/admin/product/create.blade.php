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
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Create'])

        {{-- 1st option to push error messages --}}
        {{-- @if ($errors->any())
            <div class="col-md-12 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif --}}



        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter new product" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" placeholder="Enter price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Featured Image</label>
                                <input type="file" class="form-control-file" name="featured_image_path">
                            </div>

                            <div class="form-group">
                                <label>Detail Images</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>


                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">Select Category</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Select Brand</label>
                                <select class="form-control select3_init @error('brand_id') is-invalid @enderror"
                                    name="brand_id">
                                    <option value="">Select Brand</option>
                                    {!! $htmlBrand !!}
                                </select>
                                @error('brand_id')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Enter product tag</label>
                                <select name="tags[]" class="form-control tags_selector" multiple="multiple">
                                </select>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product content</label>
                                <textarea name="contents" rows="5"
                                    class="form-control tinymce_editor_init @error('contents') is-invalid @enderror">
                                    {{ old('contents') }}</textarea>
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
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/ck5wbmfdo4p6ezf5lk0acvymsnt5h8w7697xyh2p16hv6ucv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
