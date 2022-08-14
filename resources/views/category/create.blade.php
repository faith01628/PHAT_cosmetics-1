@extends('layouts.admin')

@section('title')
    <title>Create new category</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'Create'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter new category">
                            </div>

                            <div class="form-group">
                                <label>Select Parent Category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Select Parent Category</option>
                                    {!! $htmlOption !!}
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
