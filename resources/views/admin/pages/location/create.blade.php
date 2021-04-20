@extends('admin.layout')

@section('title')
vOffice | Create Location
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('admin.location.index') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex">
                            <h4>Create Location</h4>
                        </div>
                        <div class="card-body row">
                                <div class="col-12">
                                    @foreach (['address', 'name', 'image'] as $error)
                                        @error($error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    @endforeach
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="Location Name" value="{{ old('name') }}" required>
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                </div>
                                <div class="input-group col-12 col-md-6">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text">Building Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" accept="image/*" value="{{ old('image') }}" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group col-12">
                                    <textarea class="form-control" name="address" aria-label="With textarea" placeholder="Location Address">{{ old('address') }}</textarea>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
