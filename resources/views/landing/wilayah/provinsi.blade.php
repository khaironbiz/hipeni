
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Doctors Section ======= -->
    <section id="video" class="doctors section-bg mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex mb-2">
                    @include('layouts.landing.navbar.wilayah')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <b>Judul</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead>
                                <th>#</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                </thead>
                                <tbody>
                                @foreach($provinsi as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('home.wilayah.kota', ['code'=>$p->code])}}">
                                            {{$p->name}}

                                        </a>

                                    </td>
                                    <td>{{$p->kota->count()}}</td>
                                    <td>{{$p->kecamatan->count()}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->
@endsection
