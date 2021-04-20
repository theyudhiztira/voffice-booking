@extends('admin.layout')

@section('title')
vOffice | Location Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Location Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-end">
                        <a href="{{ route('admin.location.create') }}" class="btn btn-primary">Create Location <i class="fas fa-fw fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive dataTable" id="locationTable">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($locations as $loc)
                                    <tr>
                                        <td>{{ $loc->id }}</td>
                                        <td>{{ $loc->name }}</td>
                                        <td style="width: 31% !important;"><span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $loc->address }}">{{ $loc->address }}</span></td>
                                        <td style="width: 19%; text-align: center;"><img class="img img-fluid w-75" src="{{ asset('img/locations/'.$loc->image) }}"></td>
                                        <td style="width: 14% !important;">{{ \Carbon\Carbon::parse($loc->created_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                        <td style="width: 5% !important;">
                                            <a class="btn btn-danger" title="Remove {{ $loc->name }}" href="{{ route('admin.location.delete', ['id' => $loc->id]) }}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                            <a class="btn btn-warning" title="Edit {{ $loc->name }}" href="{{ route('admin.location.edit', ['id' => $loc->id]) }}">
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
            $('#locationTable').DataTable();
        })

        const disableUser = (userId) => {
            return alert(userId);
        }
    </script>
@endsection
