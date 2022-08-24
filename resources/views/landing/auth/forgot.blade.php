
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
                    @include('layouts.landing.navbar.auth')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2 w-100">
                        <div class="row justify-content-center p-3">
                            <div class="col-6 text-center">
                                <img src="{{asset('assets/upload/images/landing/ppni.png')}}" class="w-50">
                            </div>
                        </div>
                        <form action="{{route('call_user')}}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10  mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('email') is-invalid text-danger @enderror" id="floatingInput" placeholder="email" name="email" value="{{old('email')}}">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-10">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('hp') is-invalid text-danger @enderror" id="floatingPassword" placeholder="hp" name="hp" value="{{old('hp')}}">
                                        <label for="hp">HP</label>
                                    </div>
                                    @error('hp')
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
