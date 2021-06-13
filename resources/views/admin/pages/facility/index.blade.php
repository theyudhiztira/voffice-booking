@extends('admin.layout')

@section('title')
vOffice | Facility Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Facility Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-end">
                        <a href="{{ route('admin.facility.create') }}" class="btn btn-primary">Create Facility <i class="fas fa-fw fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="userTable">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Capacity</th>
                                <th>Image</th>
                                <th>Weekend Operation</th>
                                <th>Rates</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($facilities as $fc)
                                    <tr>
                                        <td style="text-align: center;">{{ $fc->id }}</td>
                                        <td>{{ $fc->facility_name }}</td>
                                        <td>{{ $fc->location_details->name }}</td>
                                        <td style="width: 9%; text-align: center;">{{ $fc->capacity }} Pax</td>
                                        <td style="width: 15%; text-align: center;"><img class="img img-fluid w-75" src="{{ asset('img/facilities/'.$fc->image) }}"></td>
                                        <td style="text-align: center; width: 12%;">{!! $fc->weekend_operation ? "<i class='text-success fas fa-fw fa-check-circle text-center'></i><b class='d-none'>Open</b>" : "<i class='text-danger fas fa-fw fa-times-circle text-center'></i><b class='d-none'>Close</b>" !!}</td>
                                        <td style="text-align: center;">{{ $fc->deduction_rate }}</td>
                                        <td>{{ \Carbon\Carbon::parse($fc->updated_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                        <td style="width: 9%;">
                                            <a class="btn btn-danger" title="Remove {{ $fc->name }}" href="{{ route('admin.facility.delete', ['id' => $fc->id]) }}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                            <a class="btn btn-warning" title="Edit {{ $fc->name }}" href="{{ url('/admin/facility/'.$fc->id) }}">
                                                <i class="fas fa-fw fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.css"/>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#userTable').DataTable();
        })

        const disableUser = (userId) => {
            return alert(userId);
        }
    </script>
@endsection
