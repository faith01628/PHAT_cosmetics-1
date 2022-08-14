@extends('layouts.admin')

@section('title')
    <title>Edit Category</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id' => $menuFollowIdEdit->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Menu name</label>
                                <input type="text" class="form-control" name="name" placeholder="Edit menu name" value="{{ $menuFollowIdEdit->name }}">
                            </div>

                            <div class="form-group">
                                <label>Select Parent Menu</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Select Parent Menu</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
