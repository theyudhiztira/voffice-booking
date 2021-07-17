@extends('web.app')

@section('title')
vOffice | Facility {{ $facility->facility_name }}
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('web.booking') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
        </div>
    </div>
    <section>
        <div class="row mt-2">
            @foreach (['facility', 'schedule', 'your_plan'] as $err)
                @error($err)
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @enderror
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-12" style="min-height: 350px;">
                <div class="w-100 image_banner d-flex align-items-end pl-4 pb-1">
                    <h1 class="text-white font-weight-bolder shadow">{{ $facility->facility_name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row mt-3">
            <div class="col-12">
                <h5 class="font-weight-bolder text-dark">Facility Information :</h5>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-users"></i> : {{ $facility->capacity }} Pax</li>
                    <li><i class="fa fa-credit-card"></i> : {{ $facility->deduction_rate }} Credit(s) / Hour</li>
                    <li><b>{{  $facility->location_details->name }}</b></li>
                    <li>
                        <p>{{ $facility->location_details->address }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <form action="{{ route('web.facility.book') }}" method="POST">
        <section>
            <div class="row">
                <div class="col-12 col-md-6 row">
                    <div class="col-12">
                        <h5 class="font-weight-bolder text-dark">Select Booking Date :</h5>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="2020-01-02" name="date" value="{{ app('request')->input('date') ? app('request')->input('date') : old('date') }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-12">
                        <h5 class="font-weight-bolder text-dark">Select Your Plan :</h5>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="facility" value="{{ $facility->id }}">
                        <select class="form-control" name="your_plan" required>
                            <option value="">Select Your Plan</option>
                            @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->product->name }} | Available Credit :
                                {{ $plan->credits }} Hours</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row mt-3">
                <div class="col-12 mb-3">
                    <h5 class="font-weight-bolder text-dark">Choose Your Meeting Time :</h5>
                </div>
            </div>
            <div class="row">
                @if ($schedule)
                    @for ($i = $facility->start_time; $i <= $facility->end_time; $i+=100)
                        @php
                        $objName = 'booking_'.$i;
                        $data = $schedule->$objName;
                        @endphp
                        @if ($data)
                        <div class="col-6 col-md-3 mb-3">
                            <label class="w-100 rounded p-2 d-flex flex-column bg-gradient-secondary booked"
                                style="height: 150px;">
                                <input type="checkbox" name="schedule[]" value="{{ $i }}" disabled>
                                <h4 class="text-white text-center position-absolute" style="top: 35%; left: 38%;">
                                    {{ strlen(substr($i, 0, -2)) < 2 ? '0'.substr($i, 0, -2) : substr($i, 0, -2) }}:00</h4>
                            </label>
                        </div>
                        @else
                        <div class="col-6 col-md-3 mb-3">
                            <label class="w-100 rounded p-2 d-flex flex-column bg-gradient-primary available" style="height: 150px;">
                                <input type="checkbox" name="schedule[]" value="{{ $i }}">
                                <h4 class="text-white text-center position-absolute" style="top: 35%; left: 38%;">
                                    {{ strlen(substr($i, 0, -2)) < 2 ? '0'.substr($i, 0, -2) : substr($i, 0, -2) }}:00</h4>
                            </label>
                        </div>
                        @endif
                    @endfor
                @else
                    @for ($i = $facility->start_time; $i <= $facility->end_time; $i+=100)
                        <div class="col-6 col-md-3 mb-3">
                            <label class="w-100 rounded p-2 d-flex flex-column bg-gradient-primary available"
                                style="height: 150px;">
                                <input type="checkbox" name="schedule[]" value="{{ $i }}">
                                <h4 class="text-white text-center position-absolute" style="top: 35%; left: 38%;">
                                    {{ strlen(substr($i, 0, -2)) < 2 ? '0'.substr($i, 0, -2) : substr($i, 0, -2) }}:00</h4>
                            </label>
                        </div>
                    @endfor
                @endif
            </div>
        </section>
        <section class="mb-5">
            <button type="submit" class="btn btn-success w-100 py-3">BOOK NOW</button>
        </section>
    </form>
</div>
@php
    $now = \Carbon\Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD');
@endphp
@endsection

@section('css')
<style>
    .image_banner {
        background-image: url('{{ asset('img/facilities/'.$facility->image) }}');
        background-position: center;
        background-size: cover;
        min-height: 350px;
    }

    .available:hover{
      cursor: pointer;
    }

    .booked:hover{
      cursor: not-allowed;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/i18n/datepicker.en-US.min.js"></script>
    <script>
        $('input[name=date]').datepicker({
            format: 'yyyy-mm-dd',
            date: "{{ app('request')->input('date') ? app('request')->input('date') : $now }}",
            startDate: "{{ $now }}",
            endDate: "{{ \Carbon\Carbon::parse($now)->addDays(30)->isoFormat('YYYY-MM-DD') }}"
        });

        $('input[name=date]').change((el) => {
          window.location.replace(window.location.href.split('?')[0]+'?date='+el.target.value)
        });
    </script>
@endsection
