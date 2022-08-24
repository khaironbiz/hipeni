@extends('layouts.login')
@section('content')

    <div class="card-body">
        <p class="login-box-msg">Registration Form</p>
        @if(session()->has('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ url('/register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name')is-invalid @enderror" placeholder="Name" name="name" value="{{old('name')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('username')is-invalid @enderror" placeholder="Username" name="username" value="{{old('username')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('username')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('phone_cell')is-invalid @enderror" placeholder="Phone" name="phone_cell" value="{{old('phone_cell')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('phone_cell')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password" name="password" value="{{old('password')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password Confirm" name="password_confirmation">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>

            </div>
        </form>
        <hr>
        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="/" class="text-center">Login</a>
        </p>
    </div>
@endsection
