
@extends('layouts.landing.home')

@section('content')


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$title}}</h2>

            </div>

            <div class="row d-flex">
                @foreach($partners as $p)
                <div class="col-md-3" >
                    <a href="{{route('partner')}}" class="w-100">
                        <div class="card mb-3 bg-dark">
                            <img src="{{asset('assets/upload/images/partners/'.$p->logo)}}" class="w-100">
                            <div class="card-header">{{$p->singkatan}}</div>
                            <div class="card-body">{{$p->nama_partner}}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>


        </div>
    </section><!-- End Gallery Section -->
@endsection
