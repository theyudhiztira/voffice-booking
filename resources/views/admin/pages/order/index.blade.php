@extends('admin.layout')

@section('title')
vOffice | Order Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex">
                        <h3>Order Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="userTable">
                            <thead>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Product</th>
                                <th>Amount Due</th>
                                <th>Status</th>
                                <th>Date Paid</th>
                                <th>Payment Proof</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center" style="width: 3%;">{{ $order->id }}</td>
                                        <td style="width: 13%;">{{ $order->client->first_name }} {{ $order->client->last_name }}</td>
                                        <td style="width: 15%;">{{ $order->product->name }}</td>
                                        <td style="width: 10%;">IDR {{ number_format($order->amount_due) }}</td>
                                        <td class="text-center" style="width: 5%;">{!! empty($order->date_paid) ? "<b class='text-danger'>Unpaid</b><span class='d-none'>Unpaid</span>" : "<b class='text-success'>Paid</b><span class='d-none'>Paid</span>" !!}</td>
                                        <td class="text-center" style="width: 10%;">{{ $order->date_paid ? $order->date_paid : "N/A" }}</td>
                                        <td class="text-center" style="width: 13%;">
                                            @if ($order->payment_proof)
                                                <img class="img img-fluid w-75" src="{{ asset('img/payment_proof/'.$order->payment_proof) }}">
                                            @else
                                                Unpaid
                                            @endif
                                        </td>
                                        <td style="width: 12%;">{{ $order->created_at }}</td>
                                        <td class="d-flex flex-column">
                                            @if (!$order->date_paid && $order->payment_proof)
                                                <a class="btn btn-success" href="{{ route('admin.order.paid', ['id' => $order->id]) }}">Approve Payment</a>
                                            @else
                                                @if (!$order->date_paid)
                                                    <button class="btn btn-secondary" disabled>Unpaid Transaction</button>
                                                @endif
                                            @endif
                                            @if ($order->payment_proof)
                                                <a class="btn btn-warning mt-2" target='_blank' href="{{ asset('img/payment_proof/'.$order->payment_proof) }}">View Payment Proof</a>
                                            @endif
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
