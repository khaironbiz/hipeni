
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
                                <h6>Deskripsi</h6>
                                {!! $event->isi !!}
                                <h6 class="mt-3">Tanggal</h6>
                                {{$event->date_mulai}} <b> sd </b> {{$event->date_selesai}}
                                <h6 class="mt-3">Tempat</h6>
                                {{$event->tempat}}
                                <h6 class="mt-3">Akreditasi</h6>
                                @foreach($skp as $skp)
                                <div class="row">
                                    <div class="col-4">
                                        <label>{{ $skp->op->singkatan }}</label>
                                    </div>
                                    <div class="col-4">: {{ $skp->peserta }} SKP
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section><!-- End Services Section -->
@endsection
