@extends('admin.layout')

@section('title')
vOffice | Manage Booking
@endsection

@section('content')
@php
function parseTime($time){
$trimmedTime = substr($time, 0, -2);
return $trimmedTime.":00 - ".($trimmedTime+1).":00";
}
@endphp
<div class="container-fluid">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Manage Report</h4>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Facility</th>
                                    <th>Location</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Booked Hour</th>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $b)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->facility->facility_name }}</td>
                                        <td>{{ $b->facility->location_details->name }}</td>
                                        <td>{{ $b->client->first_name }} {{ $b->client->last_name }}</td>
                                        <td>{{ $b->booking_date }}</td>
                                        <td>
                                            @php
                                            $schedules = $b->schedule[0]->getOriginal();
                                            unset($schedules['id'], $schedules['facility_id'], $schedules['date'], $schedules['created_at'], $schedules['updated_at']);
                                            @endphp
                                            @foreach ($schedules as $key => $val)
                                            @if ($val)
                                            {{ parseTime($key) }}<br />
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <a href='{{route("admin.report.pdf")}}' class='btn btn-success w-100 mt-3'>Download Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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
</script>
@endsection