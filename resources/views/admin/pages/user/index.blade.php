@extends('admin.layout')

@section('title')
vOffice | User Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>User Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-end">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create User <i class="fas fa-fw fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="userTable">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($userData as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_by_details->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                        <td>
                                            <a class="btn btn-danger" title="Remove {{ $user->name }}" href="{{ route('admin.user.delete', ['id' => $user->id]) }}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                            <a class="btn btn-warning" title="Edit {{ $user->name }}" href="{{ route('admin.user.edit', ['id' => $user->id]) }}">
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
