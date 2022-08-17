@extends('layouts.admin')

@section('title')
    <title>Sliders</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/index/index.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetAlert2.js') }}"></script>
    <script src="{{ asset('admins/misc/delete/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success float-right m-2">Create Slider</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Slider Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row"> {{ $slider->id }}</th>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ $slider->image_path }}" alt=""
                                                class="image_slider_150_100"></td>
                                        <td>
                                            <a href="{{ route('sliders.edit', $slider->id) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{ route('sliders.delete', $slider->id) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
