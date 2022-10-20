
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
                        <form action="{{route('profile.update', ['id'=>$user->username])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('nama_depan') is-invalid text-danger @enderror" id="floatingInput" placeholder="Nama Depan" name="nama_depan" value="{{$user->nama_depan}}">
                                            <label for="floatingInput">Nama Depan</label>
                                        </div>
                                        @error('nama_depan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('nama_belakang') is-invalid text-danger @enderror" id="floatingInput" placeholder="Nama Belakang" name="nama_belakang" value="{{$user->nama_belakang}}">
                                            <label for="floatingInput">Nama Belakang</label>
                                        </div>
                                        @error('nama_belakang')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('gelar_depan') is-invalid text-danger @enderror" id="floatingInput" placeholder="Gelar Depan" name="gelar_depan" value="{{$user->gelar_depan}}">
                                            <label for="floatingInput">Gelar Depan</label>
                                        </div>
                                        @error('gelar_depan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('gelar_belakang') is-invalid text-danger @enderror" id="floatingInput" placeholder="Gelar Belakang" name="gelar_belakang" value="{{$user->gelar_belakang}}">
                                            <label for="floatingInput">Gelar Belakang</label>
                                        </div>
                                        @error('gelar_belakang')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <select class="form-select @error('jenis_kelamin') is-invalid text-danger @enderror" id="floatingSelect" aria-label="Floating label select example" name="jenis_kelamin">
                                                <option value="1" @if($user->jenis_kelamin == 1) selected @endif>Laki-laki</option>
                                                <option value="2" @if($user->jenis_kelamin == 2) selected  @endif>Perempuan</option>
                                                <option value="3" @if($user->jenis_kelamin == 3) selected @endif>Lainnya</option>
                                            </select>
                                            <label for="floatingSelect">Jenis Kelamin</label>
                                        </div>
                                        @error('jenis_kelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="date" class="form-control @error('tgl_lahir') is-invalid text-danger @enderror" id="floatingInput" placeholder="tanggal lahir" name="tgl_lahir" value="{{$user->tgl_lahir}}">
                                            <label for="floatingInput">Tanggal Lahir</label>
                                        </div>
                                        @error('tgl_lahir')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control @error('nik') is-invalid text-danger @enderror" id="floatingInput" placeholder="nik" name="nik" value="{{ old('nik', $user->nik)}}">
                                            <label for="floatingInput">NIK</label>
                                        </div>
                                        @error('nik')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control @error('nira') is-invalid text-danger @enderror" id="floatingInput" placeholder="nira" name="nira" value="{{ old('nira', $user->nira)}}">
                                            <label for="floatingInput">NIRA</label>
                                        </div>
                                        @error('nira')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid text-danger @enderror" id="floatingInput" placeholder="email" name="email" value="{{$user->email}}">
                                            <label for="floatingInput">Email</label>
                                        </div>
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control @error('phone_cell') is-invalid text-danger @enderror" id="floatingInput" placeholder="hp" name="phone_cell" value="{{$user->phone_cell}}">
                                            <label for="floatingInput">HP</label>
                                        </div>
                                        @error('phone_cell')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
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
