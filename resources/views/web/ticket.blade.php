@php
function parseTime($time){
$trimmedTime = substr($time, 0, -2);
return $trimmedTime.":00 - ".($trimmedTime+1).":00";
}
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      body{
          margin-top:20px;
          background:#eee;
      }

      .invoice {
          background: #fff;
          padding: 20px
      }

      .invoice-company {
          font-size: 20px
      }

      .invoice-header {
          margin: 0 -20px;
          background: #f0f3f4;
          padding: 20px
      }

      .invoice-date,
      .invoice-from,
      .invoice-to {
          display: table-cell;
          width: 1%
      }

      .invoice-from,
      .invoice-to {
          padding-right: 20px
      }

      .invoice-date .date,
      .invoice-from strong,
      .invoice-to strong {
          font-size: 16px;
          font-weight: 600
      }

      .invoice-date {
          text-align: right;
          padding-left: 20px
      }

      .invoice-price {
          background: #f0f3f4;
          display: table;
          width: 100%
      }

      .invoice-price .invoice-price-left,
      .invoice-price .invoice-price-right {
          display: table-cell;
          padding: 20px;
          font-size: 20px;
          font-weight: 600;
          width: 75%;
          position: relative;
          vertical-align: middle
      }

      .invoice-price .invoice-price-left .sub-price {
          display: table-cell;
          vertical-align: middle;
          padding: 0 20px
      }

      .invoice-price small {
          font-size: 12px;
          font-weight: 400;
          display: block
      }

      .invoice-price .invoice-price-row {
          display: table;
          float: left
      }

      .invoice-price .invoice-price-right {
          width: 25%;
          background: #2d353c;
          color: #fff;
          font-size: 28px;
          text-align: right;
          vertical-align: bottom;
          font-weight: 300
      }

      .invoice-price .invoice-price-right small {
          display: block;
          opacity: .6;
          position: absolute;
          top: 10px;
          left: 10px;
          font-size: 12px
      }

      .invoice-footer {
          border-top: 1px solid #ddd;
          padding-top: 10px;
          font-size: 10px
      }

      .invoice-note {
          color: #999;
          margin-top: 80px;
          font-size: 85%
      }

      .invoice>div:not(.invoice-footer) {
          margin-bottom: 20px
      }

      .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
          color: #2d353c;
          background: #fff;
          border-color: #d9dfe3;
      }
    </style>
    <title>Booking</title>
  </head>
  <body>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            PT Voffice
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="text-center w-50" style="margin: 0 auto;">
               <h3>Proof of Booking</h3>
               <h4 class="date text-inverse m-t-5">#VOJKT/{{str_replace('-', '/', substr($data->booking_date, 5, 7))}}/{{$data->id}}</h4>
               <h4 class="date text-inverse m-t-5">{{$data->facility->location_details->name}}</h4>
               <h5 class="date text-inverse m-t-5">{{$data->booking_date}}</h5>
               <h5 class="date text-inverse m-t-5">{{$data->facility->facility_name}}</h5>
               <h6>{{$data->facility->location_details->address}}</h6>
               <div class='row'>
                 @php
                  $schedules = $data->schedule[0]->getOriginal();
                  unset($schedules['id'], $schedules['facility_id'], $schedules['date'], $schedules['created_at'], $schedules['updated_at']);
                @endphp
                @foreach($schedules as $ksch => $sch)
                  @if ($sch)
                    <div class='col-4 p-3 mx-auto'>
                      <div style='background-color: blue;' class='rounded text-white p-2'>{{parseTime($ksch)}}</div>
                    </div>
                  @endif
                @endforeach
               </div>
            </div>

            <div class="text-left" style="margin: 0 auto;">
               <h3 class='text-center'>Visitor Details</h3>
               <div class='row'>
                 <div class='col-1'>
                  Name
                 </div>
                 <div class='col-1'>
                  :
                 </div>
                 <div class='col-8'>
                  {{$data->client->first_name}} {{$data->client->last_name}}
                 </div>
               </div>
               <div class='row'>
                 <div class='col-1'>
                  Phone
                 </div>
                 <div class='col-1'>
                  :
                 </div>
                 <div class='col-8'>
                  {{$data->client->phone}}
                 </div>
               </div>
               <div class='row'>
                 <div class='col-1'>
                  Email
                 </div>
                 <div class='col-1'>
                  :
                 </div>
                 <div class='col-8'>
                  {{$data->client->email}}
                 </div>
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note mt-0">
            * Please contact our support if you need reschedule the event<br>
            * This booking is non refundable<br>
         </div>
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> voffice.co.id</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> T:+62 21 2922 2999</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> cs@voffice.co.id</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



