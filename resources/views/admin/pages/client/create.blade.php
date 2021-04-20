@extends('admin.layout')

@section('title')
vOffice | Create Facility
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('admin.facility.index') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.facility.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex">
                            <h4>Create Facility</h4>
                        </div>
                        <div class="card-body row">
                                <div class="col-12">
                                    @foreach (['facility_name', 'location_id', 'capacity', 'deduction_rate'] as $error)
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
                                    <input type="text" class="form-control form-control-user" name="facility_name"
                                        placeholder="Room Name" value="{{ old('facility_name') }}" required>
                                </div>
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="location_id" required>
                                        <option>Select Location</option>
                                        @foreach ($locations as $loc)
                                            <option value="{{ $loc->id }}" {!! old('location_id') == $loc->id ? 'selected' : '' !!}>{{ $loc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Deduction Rates</span>
                                    </div>
                                    <input type="number" min="1" class="form-control" placeholder="2" aria-describedby="basic-addon2" name="deduction_rate" value="{{ old('deduction_rate') }}" required>
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Capacity</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="13" aria-describedby="basic-addon2" name="capacity" value="{{ old('capacity') }}" min="1" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="input-group-append" style="height: 38px;">
                                        <span class="input-group-text" id="basic-addon2">Pax</span>
                                    </div>
                                </div>
                                <div class="input-group col-12 col-md-6 mb-3">
                                    <div class="input-group-prepend" style="height: 38px;">
                                        <span class="input-group-text">Room Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" accept="image/*" value="{{ old('image') }}" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="weekend_operation" name="weekend_operation" {{ old('weekend_operation') ? "checked" : "" }} value="true">
                                        <label class="form-check-label" for="weekend_operation">Available On Weekend</label>
                                    </div>
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
