@extends('admin.layout')

@section('title')
vOffice | Edit Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('admin.product.index') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body row">
                                <div class="col-12">
                                    @foreach (['name', 'price', 'image', 'description', 'credit'] as $error)
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
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="Product Name" value="{{ old('name') ? old('name') : $name }}" required>
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Price</span>
                                    </div>
                                    <input type="hidden" name="id" value="{{ old('id') ? old('id') : $id }}" />
                                    <input type="number" min="10000" class="form-control" placeholder="150000" aria-describedby="basic-addon2" name="price" value="{{ old('price') ? old('price') : $price }}" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Credit</span>
                                    </div>
                                    <input type="number" min="1" class="form-control" placeholder="2" aria-describedby="basic-addon2" name="credit" value="{{ old('credit') ? old('credit') : $credit }}" required>
                                    <div class="input-group-append" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Hours</span>
                                    </div>
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text">Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" accept="image/*" value="{{ old('image') ? old('image') : $image }}" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group col-12 mb-3">
                                    <textarea class="form-control" name="description" aria-label="With textarea" placeholder="Description">{{ old('description') ? old('description') : $description }}</textarea>
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
