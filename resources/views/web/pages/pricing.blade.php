@extends('web.app')

@section('title')
    vOffice | Pricing
@endsection

@section('css')
    <style>
        .jumbotron-custom{
            background: rgb(40, 40, 40); /* fallback colour. Make sure this is just one solid colour. */
            background: -webkit-linear-gradient(rgba(107, 107, 107, 0.3), rgba(63, 63, 63, 0.5)), url('https://voffice.co.id/jakarta-virtual-office/images/gallery/meeting-room/mr-grand-slipi-tower.jpg'));
            background: linear-gradient(rgba(107, 107, 107, 0.3), rgba(63, 63, 63, 0.5)), url('https://voffice.co.id/jakarta-virtual-office/images/gallery/meeting-room/mr-grand-slipi-tower.jpg'); /* The least supported option. */
            background-size: cover;
            background-position: center;
            background-repeat: none;
            padding: 25vh 0;
        }
    </style>
@endsection

@section('content')
    <section class="jumbotron-custom mb-3">
        <div class="row">
            <div class="col text-center text-white">
                <h1 class="mb-3"><b>Meeting Room</b></h1>
                <h5>NEW WAY OF WORK, WORK SAFER, SAVE COST, SAVE TIME, MORE EFFICIENT WITH VIRTUAL OFFICE</h5>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="img img-fluid rounded" src="https://voffice.co.id/jakarta-virtual-office/img/meeting-room/off-meet.jpg">
                </div>
                <div class="col-12 col-md-8 d-flex align-items-center align-content-center flex-column">
                    <h3 class="text-dark d-flex align-self-center mt-3 w-100">Meeting Room & Conference Room</h3>
                    <p class="d-flex align-self-center">
                        vOffice has meeting room options which are ideal for start-up and established professionals to host meetings and conference with potential partners. Our meeting rooms are located at prestigious easy-to-access locations and well equipped with all necessary presentation stuff, free internet connection, ande complimentary refreshment. It will give you the convenience you need to make your meeting run smoothly and with success.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h1>Choose Your Package</h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                @if (!empty($products))
                    @foreach ($products as $prd)
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <img class="img img-fluid mb-3" src="{{ asset('img/products/'.$prd->image) }}">
                                    <h4 class="card-title text-center text-dark">{{ $prd->name }}</h4>
                                    <p class="text-center">{{ $prd->description }}</p>
                                    <hr>
                                    <h5 class="card-subtitle mb-2 text-dark text-center">Only</h5>
                                    <h3 class=" text-center">IDR {{ number_format($prd->price) }}</h3>
                                    <p class="card-text text-center">Credit : {{ $prd->credit }}</p>
                                    <a href="{{ route('web.buy', ['id' => $prd->id]) }}" class="btn btn-primary w-100">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else

                @endif
            </div>
        </div>
    </section>
@endsection
