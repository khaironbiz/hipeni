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
                            <li class="breadcrumb-item"><a href="{{url('admin/profesi/')}}">{{$class}}</a></li>
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
                        <div class="card">
                            @include('admin.sub_menu.user')
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Profesi</label>
                                                    <div class="col-md-8 col-lg-9">: {{$profesi->nama_profesi}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Slug</label>
                                                    <div class="col-md-8 col-lg-9">: {{$profesi->slug}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach($organisasi as $organisasi)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Organisasi</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->nama_op}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Singkatan</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->singkatan}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Pimpinan</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->pimpinan}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Alamat</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->alamat}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Email</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->email}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Website</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->web}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">HP</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->hp}}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 col-lg-3">Telp</label>
                                                    <div class="col-md-8 col-lg-9">: {{$organisasi->telp}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2">
                                        <div class="visible-print text-center">
                                            {!! QrCode::size(100)->generate(Request::url()); !!}
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-warning">Back</a>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
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
