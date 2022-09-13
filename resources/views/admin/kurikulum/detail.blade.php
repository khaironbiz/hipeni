@extends('admin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{$class}}</a></li>
                            <li class="breadcrumb-item active">{{$sub_class}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            @include('admin.sub_menu.training')
                            @if(\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {!! \Session::get('success') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2">Training</label>
                                            <div class="col-sm-10">: {{$training->nama_training}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Topik</label>
                                            <div class="col-sm-10">: {{$kurikulum->topik}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Tipe Materi</label>
                                            <div class="col-sm-10">: {{$kurikulum->materi_type->materi_type}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Penjelasan</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">{!! $kurikulum->penjelasan !!}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                            Tambah
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('admin.kurikulum.detail.store')}}" method="post">
                                                        @csrf
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$kurikulum->topik}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-2">
                                                                <label>Metode</label>
                                                                <select class="form-control" name="study_method_id">
                                                                    @foreach($metode as $data)
                                                                        <option value="{{$data->id}}">{{$data->study_method}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div>
                                                                <label>JPL</label>
                                                                <input type="number" class="form-control" name="jpl">
                                                                <input type="hidden" class="form-control" name="kurikulum_id" value="{{$kurikulum->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-sm table-striped">
                                            <thead>
                                            <th>#</th>
                                            <th>Metode</th>
                                            <th>JPL</th>
                                            <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                            @foreach($kurikulum_detail as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->study_method->study_method}}</td>
                                                <td>{{$data->jpl}}</td>
                                                <td><a href="" class="btn btn-sm btn-info">Detail</a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{route('admin.kurikulum.show',['slug'=>$training->slug])}}" class="btn btn-info btn-sm">Back</a>
                                <a href="{{route('admin.kurikulum.edit', ['slug' => $kurikulum->slug])}}" class="btn btn-success btn-sm">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('admin.kurikulum.destroy', ['slug' => $kurikulum->slug])}}" method="post">
                                                @csrf
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi hapus data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <label>Topik</label>
                                                    <b>{{$kurikulum->topik}}</b>
                                                </div>
                                                <div class="row">
                                                    <input type="checkbox">  Setuju untuk menghapus data ini
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
