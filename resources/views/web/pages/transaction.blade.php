@extends('web.app')

@section('title')
vOffice | Transaction
@endsection

@section('content')
<div class="container">
    <section class="my-5">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('web.home') }}"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Invoice ID : {{ $transaction->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="badge {{ $transaction->payment_proof ? $transaction->date_paid ? 'badge-success': 'badge-secondary' : 'badge-danger' }} w-100 py-3 text-lg">{{ $transaction->payment_proof ? $transaction->date_paid ? 'Paid': 'Waiting for confirmation' : 'Unpaid' }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6>From : </h6>
                                <h5>PT vOffice</h5>
                                <p>
                                    Centennial Tower Level 29, Jl. Jend Gatot Suboto No.27, RT.2/RW.2, Karet Semanggi,
                                    Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <h6>To : </h6>
                                <h5>{{ $transaction->client->first_name }} {{ $transaction->client->last_name }}</h5>
                                <h6>{{ $transaction->client->phone }}</h6>
                                <h6>{{ $transaction->client->email }}</h6>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                Order Details
                            </div>
                        </div>
                        <div class="row">
                            <div class="col table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Prod. Id</th>
                                        <th>Prod. Name</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Price</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $transaction->product->id }}</td>
                                            <td>{{ $transaction->product->name }}</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">IDR {{ number_format($transaction->product->price) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-3 text-right">
                                <h6>VAT (10%)</h6>
                            </div>
                            <div class="col-3 text-right">
                                <h6>IDR {{ number_format($transaction->product->price * 0.1) }}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-3 text-right">
                                <h6 class="font-weight-bold">Amount Due</h6>
                            </div>
                            <div class="col-3 text-right">
                                <h6 class="font-weight-bold">IDR {{ number_format($transaction->product->price * 1.1) }}</h6>
                            </div>
                        </div>
                        @if (empty($transaction->payment_proof))
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="alert alert-warning row" role="alert">
                                        <h4 class="alert-heading col-12">How to Pay : </h4>
                                        <p class="col-6">
                                            <b>PAYMENT USING CHEQUE</b><br>
                                            Cheque will be considered valid only after we received it in our bank account.<br>
                                            Send the cheque to : PT Voffice<br>
                                            PT Voffice GD Menara Rajawali, Lt. 7Jl. Mega Kuningan Lot 5.1<br>
                                            Kawasan Mega KuninganKuningan Timur - Setiabudi<br>
                                            Jakarta Selatan 12950
                                        </p>
                                        <p class="col-6">
                                            <b>BANK TRANSFER</b><br>
                                            Bank : BCA<br>
                                            Swift Code : CENAIDJA<br>
                                            Account Name : PT Voffice<br>
                                            Account No : 6560-133-888
                                        </p>
                                        <hr class="col-12">
                                        <p class="mb-0">If you already paid the invoice please upload your payment proof below : </p>
                                        <form method="POST" action="{{ route('web.transaction.uploadPaymentProof') }}" class="row" enctype="multipart/form-data">
                                            @error('payment_proof')
                                                <div class="col-11 mt-2">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        {{ $message }}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @enderror
                                            <div class="input-group col-11 my-2">
                                                <div class="input-group-prepend" style="height: 38px;">
                                                    <span class="input-group-text">Payment Proof</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="payment_proof" accept="image/*" value="{{ old('payment_proof') }}" required>
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    <input type="hidden" name="id" value="{{ $transaction->id }}" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                </div>
                                            </div>
                                            <div class="col-11 my-2">
                                                <button class="btn btn-primary">Upload Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
