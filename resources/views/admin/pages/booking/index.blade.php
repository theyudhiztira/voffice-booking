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
                        <h4>Manage Bookings</h4>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Facility</th>
                                    <th>Location</th>
                                    <th>Client</th>
                                    <th>Booked Hour</th>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $b)

                                        <tr>
                                            <td>{{ $b->id }}</td>
                                            <td>{{ $b->facility->facility_name }}</td>
                                            <td>{{ $b->facility->location_details->name }}</td>
                                            <td>{{ $b->client->first_name }} {{ $b->client->last_name }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection