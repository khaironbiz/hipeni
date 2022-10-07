
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Doctors Section ======= -->
    <section id="video" class="doctors section-bg mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>Terimakasih, pendaftaran anda telah kami terima, silahkan aktifkan akun anda dengan mengisi password pada form dibawah ini</p>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex mb-2">
                    @include('layouts.landing.navbar.auth')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2 w-100">
                        <div class="row justify-content-center p-3">
                            <div class="col-6 text-center">
                                <img src="{{asset('assets/upload/images/landing/ppni.png')}}" class="w-50">
                            </div>
                        </div>
                        <form action="{{route('aktifkan', ['username'=>$user->username])}}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10  mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="email" name="email" value="{{$user->email}}" readonly>
                                        <label for="floatingInput">Email</label>
                                    </div>

                                </div>
                                <div class="col-md-10">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('password') is-invalid text-danger @enderror" id="floatingPassword" placeholder="password" name="password">
                                        <label for="hp">Password</label>
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center mt-5">
                            <button type="submit" class="btn btn-success">Aktifkan Akun</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->
@endsection
