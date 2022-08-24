
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
                    <form action="{{route('profile.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                    <div class="card p-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>Update Data Diri</b>
                            </div>
                            <div class="card-body">
                                <div class="row mb-1">
                                    <div class="col-md-3 col-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <input type="text" name="nama" value="{{$user->name}}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3 col-4">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <input type="text" name="username" value="{{$user->username}}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3 col-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3 col-4">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <input type="number" name="phone_cell" value="{{$user->phone_cell}}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3 col-4">
                                        <label>Foto</label>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <input type="file" name="file" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('profile')}}" class="btn btn-sm btn-danger">Back</a>
                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->

@endsection
