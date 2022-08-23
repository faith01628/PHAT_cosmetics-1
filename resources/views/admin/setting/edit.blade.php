@extends('layouts.admin')

@section('css')
    <link href="{{ asset('admins/misc/add/add.css') }}" rel="stylesheet" />
@endsection

@section('title')
    <title>Edit Settings</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin..content-header', ['name' => 'Settings', 'key' => 'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                    name="config_key" placeholder="Enter config key" value="{{ $setting->config_key }}">
                                @error('config_key')
                                    <div class="alert alert-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value" placeholder="Enter config value"
                                        value="{{ $setting->config_value }}">
                                    @error('config_value')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <textarea class="form-control @error('config_value') is-invalid @enderror" name="config_value"
                                    placeholder="Enter config value" rows="5">{{ $setting->config_value }}</textarea>
                            @endif




                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
