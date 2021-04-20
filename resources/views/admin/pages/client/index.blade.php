@extends('admin.layout')

@section('title')
vOffice | Client Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header py-3 d-flex justify-content-start">
                        <h3>Client Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="userTable">
                            <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registered On</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($clients as $c)
                                    <tr>
                                        <td style="text-align: center;">{{ $c->id }}</td>
                                        <td>{{ $c->first_name }}</td>
                                        <td>{{ $c->last_name }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($c->created_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                        <td style="width: 9%;">
                                            {{-- <a class="btn btn-danger" title="View {{ $c->name }}" href="{{ route('admin.client.show', ['id' => $c->id]) }}"> --}}
                                                <i class="fas fa-fw fa-eye"></i>
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
