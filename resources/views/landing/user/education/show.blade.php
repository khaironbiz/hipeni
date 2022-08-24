
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
                <div class="col-md-4 d-flex">
                    @include('layouts.landing.navbar.user')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card w-100">

                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <b>Pendidikan User</b>
                                    </div>
                                    <div class="col-6 text-end">

                                        <form action="{{route('education.user.destroy', ['id'=> $education->id])}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->education_level->education_level}}" readonly>
                                            <label for="floatingSelect">Level Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->program_studi}}" readonly>
                                            <label for="floatingInput">Jurusan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->institusi}}"  readonly>
                                            <label for="floatingInput">Intitusi Pendidikan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingInput" value="{{$education->tahun_lulus}}" readonly>
                                            <label for="floatingInput">Tahun Lulus</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->nomor_ijazah}}" readonly>
                                            <label for="floatingInput">Nomor Ijazah</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->ttd_ijazah}}" readonly>
                                            <label for="floatingInput">Penanda Tangan Ijazah</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="{{$education->pendidikan_terahir=1 ? "Ya" : "Tidak"}}" readonly>
                                            <label for="floatingInput">Apakah Pendidikan Terahir?</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('education.user.edit',['slug'=>$education->slug])}}" class="btn btn-success">Edit Pendidikan</a>
                                    </div>
                                    <div class="col-md-12">
                                        @if(file_exists('assets/upload/files/ijazah/'.$education->file_ijazah) ===true)
                                            <embed type="application/pdf" src="{{asset('assets/upload/files/ijazah/'.$education->file_ijazah)}}" width="460" height="980"></embed>
                                        @else
                                            {{'assets/upload/files/ijazah/'.$education->file_ijazah}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->

@endsection
