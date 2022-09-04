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
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card mt-3">
                                        <form form id="quickForm" action="{{route('admin.study.methode.update', ['slug' => $methode->slug])}}" method="POST">
                                            @csrf
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if(\Session::has('success'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        {!! \Session::get('success') !!}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="row mb-1">
                                                    <label class="col-sm-2">Materi Type</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="study_method" value="{{$methode->study_method}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-center">
                                                <a href="{{route('admin.study.methode')}}" class="btn btn-info btn-sm">Back</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                    Delete
                                                </button>
                                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                                            </div>
                                        </form>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form form id="quickForm" action="{{route('admin.study.methode.destroy', ['slug' => $methode->slug])}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body text-left">

                                                            <div class="row mb-1">
                                                                <label class="col-sm-4 col-form-label">Materi Type</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"class="form-control" name="nama_training" value="{{$methode->study_method}}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-12 col-form-label">
                                                                    <input type="checkbox" required> Apakah anda yakin akan menghapus data diatas????
                                                                </label>
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
