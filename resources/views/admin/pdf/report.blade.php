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
    <img style='margin: 0 auto; text-align: left;' src="data:image/png;base64,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" />
    <h6 style='text-align: left; margin-top: 73px;'>
    <b style='font-size: 27px;'>PT Voffice</b><br />
    Centennial Tower Level 29, Jl. Jend Gatot Suboto No.27, RT.2/RW.2,<br /> Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan,<br /> Daerah Khusus Ibukota Jakarta 12950<br />Phone : +62 21 2922 2999 | Email : cs@voffice.co.id</h6>
    <h3>
      Booking Report
    </h3>
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
          <td>VOJKT/{{str_replace('-', '/', substr($b->booking_date, 5, 7))}}/{{ $b->id }}</td>
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