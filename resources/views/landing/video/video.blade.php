
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Doctors Section ======= -->
    <section id="video" class="doctors section-bg mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Video</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
            @foreach($videos as $data)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <iframe width="auto" src="https://www.youtube.com/embed/{{$data->id_video}}"
                                title="YouTube video player" frameborder="1"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                        <div class="card-header"><small><b>{{$data->judul}}</b></small></div>
                        <div class="card-body"><small>{{$data->channel}}</small></div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
    </section>
    <!-- End Doctors Section -->
@endsection
