@php
function parseTime($time){
$trimmedTime = substr($time, 0, -2);
return $trimmedTime.":00 - ".($trimmedTime+1).":00";
}
@endphp
<html>
  <head>
    <style>
      table thead tr th,
      table tbody tr td{
        padding: 5px;
        border: 1px solid #000; 
      }

      table{
        width: 100%;
      }
    </style>
  </head>
  <body>
    <h1>
      Booking Report
    </h1>
    <table border='0' cellspacing='0' cellpadding='0'>
      <thead>
        <tr>
          <th>Booking ID</th>
          <th>Facility</th>
          <th>Location</th>
          <th>Client</th>
          <th>Date</th>
          <th>Booked Hour</th>
        </tr>
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
  </body>
</html>