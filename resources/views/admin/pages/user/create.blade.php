@extends('admin.layout')

@section('title')
vOffice | Create User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('admin.user.index') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex">
                            <h4>Create User</h4>
                        </div>
                        <div class="card-body row">
                                <div class="col-12">
                                    @error('name')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                    @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="John Doe" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="john.doe@gmail.com" value="{{ old('email') }}" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
