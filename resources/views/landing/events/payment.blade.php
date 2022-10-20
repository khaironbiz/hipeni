
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="events" class="services services mt-5">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>{{$event->ringkasan}}</p>
            </div>
            <div class="row">
                <div class="col-md-4  d-flex">
                    @include('layouts.landing.navbar.event')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>{{$event->judul}}</b>
                            </div>
                            <div class="card-body">

                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->

@endsection
