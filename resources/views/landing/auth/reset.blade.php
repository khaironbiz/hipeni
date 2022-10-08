
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Doctors Section ======= -->
    <section id="video" class="doctors section-bg mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$title}}</h2>
                <h6>{{$user->email}}</h6>
                <?php
                $jam=date('H');
                if($jam <=10){
                    $salam = "Selamat pagi";
                }elseif($jam <14){
                    $salam = "Selamat Siang";
                }elseif($jam <17){
                    $salam = "Selamat Sore";
                }elseif($jam <19){
                    $salam = "Selamat Petang";
                }else{
                    $salam = "Selamat Malam";
                }
                ?>
                <p>{{$salam}}<b> {{$user->nama_lengkap}},</b> Silahkan input password baru anda, pastikan password yang anda buat uniq, tidak mudah ditebak dan mudah iingat</p>
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
                        <form action="{{route('reset_password', ['username'=>$user->username])}}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10  mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid text-danger @enderror" id="floatingInput" placeholder="password" name="password">
                                        <label for="floatingInput">Password</label>
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-10">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('c_password') is-invalid text-danger @enderror" id="floatingPassword" placeholder="password_confirmation" name="password_confirmation">
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>
                                    @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center mt-5">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->
@endsection
