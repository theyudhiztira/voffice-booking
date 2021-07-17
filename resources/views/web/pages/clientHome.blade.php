@extends('web.app')

@section('title')
vOffice | Client Dashboard
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h3>Welcome, <b>{{ \Auth::guard('client')->user()->first_name }} {{ \Auth::guard('client')->user()->last_name }}</b></h3>
            </div>
            <div class="row">
                <div class="col-12 px-4">
                    <a class="btn btn-primary p-3" href="{{ route('web.booking') }}"><i class="fas fa-fw fa-calendar-alt"></i> Book a Room</a>
                    <a class="btn btn-warning p-3" href="{{ route('web.pricing') }}"><i class="fas fa-fw fa-shopping-basket"></i> Buy a Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-3">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>My Plan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped w-100" id="planTable">
                                    <thead>
                                        <th>Plan ID</th>
                                        <th>Plan</th>
                                        <th>Remaining Credits</th>
                                        <th>Expiry Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $plan)
                                        <tr>
                                            <td>MR{{ sprintf("%03d", $plan->id) }}</td>
                                            <td>{{ $plan->product->name }}</td>
                                            <td>{{ $plan->credits }}</td>
                                            <td>{{ \Carbon\Carbon::parse($plan->next_renew_date)->isoFormat('YYYY MMM DD') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-3">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Booking History</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped w-100">
                                    <thead>
                                        <th>Booking ID</th>
                                        <th>Facility</th>
                                        <th>Credit Used</th>
                                        <th>Booking Date</th>
                                        <th>Booked At</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        <tr>
                                            <td>VOJKT/{{str_replace('-', '/', substr($booking->booking_date, 5, 7))}}/{{$booking->id}}</td>
                                            <td>{{ $booking->facility->facility_name }}</td>
                                            <td>{{ $booking->credit_used }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->isoFormat('YYYY MMMM DD HH:mm') }}</td>
                                            <td><a target="_blank" class='btn btn-success' href='{{route("web.booking.ticket", ["id" => $booking->id])}}'>View</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-3">
    <div class="container mt-3">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Transaction History</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped w-100">
                                    <thead>
                                        <th>Trans. ID</th>
                                        <th>Product</th>
                                        <th>Amount Due</th>
                                        <th>Status</th>
                                        <th>Date Paid</th>
                                        <th>Trans. Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $trx)
                                        <tr>
                                            <td>INV{{ sprintf("%03d", $trx->id) }}</td>
                                            <td>{{ $trx->product && $trx->product->name }}</td>
                                            <td>IDR {{ number_format($trx->amount_due) }}</td>
                                            <td>{!! empty($trx->date_paid) ? "<b class='text-danger'>Unpaid</b><span class='d-none'>Unpaid</span>" : "<b class='text-success'>Paid</b><span class='d-none'>Paid</span>" !!}</td>
                                            <td>{{ $trx->date_paid ? \Carbon\Carbon::parse($trx->date_paid)->isoFormat('YYYY MMM DD') : "-" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($trx->created_at)->isoFormat('YYYY MMM DD HH:mm') }}</td>
                                            <td>
                                                @if(empty($trx->date_paid))
                                                <a class='btn btn-success' href='<?= route("web.transaction.detail", ["id" => $trx->id]) ?>'>View</a>
                                                @else
                                                <button class="btn btn-secondary" disabled>View</button>
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
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.css" />
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
<script>
    $(document).ready(() => {
        $('table').DataTable();
    })

    const disableUser = (userId) => {
        return alert(userId);
    }
</script>
@endsection