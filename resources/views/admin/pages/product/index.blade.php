@extends('admin.layout')

@section('title')
vOffice | Product Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Product Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-end">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create Product <i class="fas fa-fw fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="userTable">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Credit</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $pd)
                                    <tr>
                                        <td style="text-align: center;">{{ $pd->id }}</td>
                                        <td>{{ $pd->name }}</td>
                                        <td>IDR {{ number_format($pd->price) }}<span class="d-none">{{ $pd->price }}</span></td>
                                        <td>{{ $pd->credit }}</td>
                                        <td style="width: 15%; text-align: center;">{{ $pd->description }}</td>
                                        <td style="width: 15%; text-align: center;"><img class="img img-fluid w-75" src="{{ asset('img/products/'.$pd->image) }}"></td>
                                        <td>{{ \Carbon\Carbon::parse($pd->updated_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                        <td style="width: 9%;">
                                            <a class="btn btn-danger" title="Remove {{ $pd->name }}" href="{{ route('admin.product.delete', ['id' => $pd->id]) }}">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                            <a class="btn btn-warning" title="Edit {{ $pd->name }}" href="{{ route('admin.product.edit', ['id' => $pd->id]) }}">
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
