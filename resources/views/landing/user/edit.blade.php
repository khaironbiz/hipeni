
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
                        <form action="{{route('profile.update', ['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control is-invalid text-danger" id="floatingInput" placeholder="Nama Depan" name="nama_depan" value="{{$user->nama_depan}}">
                                            <label for="floatingInput">Nama Depan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Belakang" name="nama_belakang" value="{{$user->nama_belakang}}">
                                            <label for="floatingInput">Nama Belakang</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Gelar Depan" name="gelar_depan" value="{{$user->gelar_depan}}">
                                            <label for="floatingInput">Gelar Depan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Gelar Belakang" name="gelar_belakang" value="{{$user->gelar_belakang}}">
                                            <label for="floatingInput">Gelar Belakang</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jk">
                                                <option selected>---Pilih---</option>
                                                <option value="1" {{ $user->jk == 1 ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="2" {{ $user->jk == 2 ? 'selected' : '' }}>Perempuan</option>
                                                <option value="3" {{ $user->jk == 3 ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            <label for="floatingSelect">Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="tgl_lahir" value="{{$user->tgl_lahir}}">
                                            <label for="floatingInput">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="nik" value="{{$user->nik}}">
                                            <label for="floatingInput">NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="nira" name="nira" value="{{$user->nira}}">
                                            <label for="floatingInput">Nira</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{$user->email}}">
                                            <label for="floatingInput">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="phone_cell" value="{{$user->phone_cell}}">
                                            <label for="floatingInput">HP</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="floatingInput" name="file">
                                            <label for="floatingInput">Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center mt-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->

@endsection
