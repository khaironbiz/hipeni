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
                            @include('admin.sub_menu.user')
                            <form form id="quickForm" action="/admin/user/update/{{$user->username}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- /.card-header -->
                                <div class="card-body">

                                    @if(\Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {!! \Session::get('success') !!}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                        <div class="row mb-1">
                                            <label class="col-sm-2">Nama Depan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control @error('nama_depan')is-invalid @enderror" name="nama_depan" value="{{$user->nama_depan}}">
                                                @error('nama_depan')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2">Nama Belakang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control @error('nama_belakang')is-invalid @enderror" name="nama_belakang" value="{{$user->nama_belakang}}">
                                                @error('nama_belakang')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-2">Gelar Depan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="gelar_depan" value="{{$user->gelar_depan}}">
                                            </div>
                                            <label class="col-sm-2">Gelar Belakang</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control @error('gelar_belakang')is-invalid @enderror" name="gelar_belakang" value="{{$user->gelar_belakang}}">
                                                @error('gelar_belakang')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-2">NIK</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control @error('nik')is-invalid @enderror" name="nik" value="{{$user->nik}}">
                                                @error('nik')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2">NIRA</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control @error('nira')is-invalid @enderror" name="nira" value="{{$user->nira}}">
                                                @error('nira')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-2">DOB</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control @error('tgl_lahir')is-invalid @enderror" name="tgl_lahir" value="{{$user->tgl_lahir}}">
                                                @error('tgl_lahir')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin">
                                                    <option value="1" @if($user->jenis_kelamin == 1){ selected } @endif>Laki-laki</option>
                                                    <option value="2" @if($user->jenis_kelamin == 2){ selected } @endif>Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label class="col-sm-2">Email</label>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{$user->email}}">
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <label class="col-sm-2">HP</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control @error('phone_cell')is-invalid @enderror" name="phone_cell" value="{{$user->phone_cell}}">
                                                @error('phone_cell')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-2">Foto</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control @error('file')is-invalid @enderror" type="file" name="file">
                                                    @error('file')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-2"> <img src="{{url('assets/upload/images/user/'.$user->foto)}}" class="w-100"></div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="/admin/user/show/{{$user->username}}" class="btn btn-info btn-sm">Back</a>
                                        <button class="btn btn-sm btn-success" type="submit">Update</button>
                                    </div>
                                </form>
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
