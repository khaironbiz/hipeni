
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
                    @include('layouts.landing.navbar.education')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card w-100">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <b>Pendidikan</b>
                                </div>
                                <div class="col-6 text-end">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead>
                                <th>#</th>
                                <th>Tipe</th>
                                <th>Level</th>
                                <th>Grade</th>
                                <th>Action</th>
                                </thead>
                                <tbody>

                                @foreach($education_level as $e)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$e->education_type->education_type}}</td>
                                    <td>{{$e->education_level}}</td>
                                    <td>{{$e->grade}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
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
{{--    Modal--}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Type Pendidikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('education.level.store')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Tipe Pendidikan</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm" name="education_type_id">
                                <option value="">----pilih----</option>
                                @foreach($education_type as $et)
                                <option value="{{$et->id}}">{{$et->education_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Grade</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="number" name="grade">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Level Pendidikan</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="education_level">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
