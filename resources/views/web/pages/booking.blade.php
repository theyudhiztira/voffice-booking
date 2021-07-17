@extends('web.app')

@section('title')
    vOffice | Booking
@endsection

@section('content')
<section class="container my-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1>Choose Meeting Room</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($facilities as $fc)
            @php
                $style = "
                    background: rgb(40, 40, 40);
                    background: -webkit-linear-gradient(rgba(107, 107, 107, 0.3), rgba(63, 63, 63, 0.5)), url('".asset('img/facilities/'.$fc->image)."'));
                    background: linear-gradient(rgba(107, 107, 107, 0.3), rgba(63, 63, 63, 0.5)), url('".asset('img/facilities/'.$fc->image)."');";
            @endphp
            <div class="col-6 col-md-4">
                <div class="w-100 facilities-card d-flex flex-column justify-content-end p-3" style="{{ $style }}">
                    <div class="w-100">
                        <h4 class="text-white">{{ $fc->facility_name }}</h4>
                    </div>
                    <div class="w-100">
                        <h6 class="text-white font-weight-bold shadow"><i class="fas fa-fw fa-users"></i> : {{ $fc->capacity }} Pax</h6>
                    </div>
                    <div class="w-100">
                        <h6 class="text-white font-weight-bold shadow"><i class="fas fa-fw fa-map-pin"></i> : {{ $fc->location_details->name }}</h6>
                    </div>
                    <div class="w-100">
                        <h6 class="text-white font-weight-bold shadow"><i class="fas fa-fw fa-credit-card"></i> : {{ $fc->deduction_rate }} / Hour</h6>
                    </div>
                    <a class="btn btn-primary" href="{{ route('web.facility', [
                        'id' => $fc->id
                    ]) }}">Book Now</a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('css')
    <style>
        .facilities-card{
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            min-height: 350px !important;
        }
    </style>
@endsection
