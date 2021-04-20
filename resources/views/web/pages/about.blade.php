@extends('web.app')

@section('title')
    vOffice | About Us
@endsection

@section('css')
    <style>
        .mission-vision{
            background-image: radial-gradient(circle, rgb(246, 247, 250) 0px, rgb(225, 227, 235) 100%);
        }

        .what-is-vo{
            background: rgb(40, 40, 40); /* fallback colour. Make sure this is just one solid colour. */
            background: -webkit-linear-gradient(rgba(85, 85, 85, 0.8), rgba(37, 37, 37, 0.8)), url('https://voffice.co.id/jakarta-virtual-office/img/gallery/mr-lounge.jpg'));
            background: linear-gradient(rgba(85, 85, 85, 0.8), rgba(37, 37, 37, 0.8)), url('https://voffice.co.id/jakarta-virtual-office/img/gallery/mr-lounge.jpg'); /* The least supported option. */
            background-size: cover;
            background-position: center;
            background-repeat: none;
            padding: 10vh 0;
        }

        .card-img-overlay {
            background: rgba(0,0,0,.5);
            background: linear-gradient(0deg,rgba(0,0,0,.8) 0,rgba(0,0,0,.1));
            color: #f8f9fa;
            display: flex;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
            border-radius: calc(.25rem - 1px);
        }
    </style>
@endsection

@section('content')
    <section class="section what-is-vo">
        <div class="container py-5 mb-3 text-white">
            <div class="row mt-4 mb-3">
                <div class="col">
                    <h1 class="text-center">What is Virtual Office?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <p class="d-flex font-weight-light text-center" style="font-size: 1.8rem;">
                        A service that offer smart business owner or aspiring entrepreneurs flexible and expandable business facilities at the fraction of a conventional office.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section px-5 pt-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-center text-dark">About vOffice</h2>
                </div>
            </div>
            <div class="row">
                <div class="d-none d-md-flex col-md-6 align-items-center justify-content-center mb-5">
                    <img class="img img-fluid d-flex rounded" style="width: 85%;" src="https://beta.voffice.co.id/images/titi-kamal/webp/lounge-ct-01.webp">
                </div>
                <div class="col-12 col-md-6 mb-5 d-flex align-items-center">
                    <p class="text-dark d-flex">
                        vOffice is the first virtual office provider and the only provider who have the most centre that spreaded all over Jakarta. We also provide many services to support your business needs such as Virtual Office, Serviced Office, Call Answering, Meeting Room, Event Space, even Company Incorporation and Tax Advisory.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5 mission-vision pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-6">
                    <h2 class="title-text">Mission</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        vOffice is perfect for today’s fast-moving, mobile business people and vOffice clients save time and money and is able to operate an agile business that suits today business landscape.
                        <br>
                        <br>
                        At vOffice, we are committed towards your business success in the following manner:
                    </p>
                    <ul>
                        <li>Eliminating the costly set up fee of a new office</li>
                        <li>Ensuring that your business overheads are kept minimal</li>
                        <li>Creating a competitive edge for your business to thrive on</li>
                        <li>Affording your business to utilise the services of our team of professionals</li>
                        <li>Empowering the growth of your business</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mb-6">
                    <h2 class="title-text">Vision</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        Building a global community
                        vOffice was founded in 2003 with the vision to create environments where people and companies come together and do their best work. Since then we’ve grown into a global workplace provider committed to delivering flexible solutions, inspiring, safety-focused spaces, and unmatched community experiences. Today, we're constantly reimagining how the workplace can help everyone, be more motivated, productive, and happy—because that’s how tomorrow works.
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection
