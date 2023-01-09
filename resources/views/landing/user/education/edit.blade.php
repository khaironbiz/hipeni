
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
                        <form action="{{route('education.user.update', ['id'=>$education_user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <b>Pendidikan User</b>
                                    </div>

                                </div>
                            </div>
                            @include('landing.user.education._form')

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @if(file_exists('assets/upload/files/ijazah/'.$education_user->file_ijazah))
                                        <embed type="application/pdf" src="{{asset('assets/upload/files/ijazah/'.$education_user->file_ijazah)}}" width="460" height="980"></embed>
                                    @endif

                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Doctors Section -->

@endsection
