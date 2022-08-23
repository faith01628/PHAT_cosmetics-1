@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet" />
@endsection


@section('title')
    <title>Edit Slider</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('sliders.update', ['id' =>$slider->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Slider name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter name" value="{{ $slider->name }}">
                                @error('name')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $slider->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image_path') is-invalid @enderror"
                                    name="image_path">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img src=" {{ $slider->image_path }}" alt="" class="image_slider">
                                    </div>
                                </div>
                                @error('image_path')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
