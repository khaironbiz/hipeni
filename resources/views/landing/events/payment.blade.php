
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="events" class="services services mt-5">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>{{$transaction->nama}}</p>
            </div>
            <div class="row">
                <div class="col-md-4  d-flex">
                    @include('layouts.landing.navbar.event')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>Checkout</b>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <th>{{$transaction->nama}}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>:</th>
                                        <th>{{$transaction->email}}</th>
                                    </tr>
                                    <tr>
                                        <th>HP</th>
                                        <th>:</th>
                                        <th>{{$transaction->hp}}</th>
                                    </tr>
                                    <tr>
                                        <th>Tagihan</th>
                                        <th>:</th>
                                        <th>{{ number_format($transaction->tagihan)}}</th>
                                    </tr>
                                    <tr>
                                        <th>Pembayaran</th>
                                        <th>:</th>
                                        <th>
                                            <select class="form-select">
                                                @foreach($payment as $payment)
                                                <option value="{{ $payment['paymentMethod'] }}">{{ $payment['paymentName']." - ".$payment['paymentMethod']." - ".$payment['totalFee'] }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                    </tr>
                                </table>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->

@endsection
