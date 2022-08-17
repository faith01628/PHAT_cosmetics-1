@extends('layouts.admin')

@section('title')
    <title>Sliders</title>
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

                                {{-- @foreach ($menus as $menu) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Homepage_Slider</td>
                                        <td>Description 1</td>
                                        <td>Image 1</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-default">Edit</a>
                                            <a href="#"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $menus->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
