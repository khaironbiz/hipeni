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
                            <div class="card-header">
                                <b>Create Partner</b>
                            </div>
                            <form action="{{route('admin.partner.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Perusaan</label>
                                        <input type="text" class="form-control" name="nama_partner" value="{{old('nama_partner')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Singkatan</label>
                                        <input type="text" class="form-control" name="singkatan" value="{{old('singkatan')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>HP</label>
                                        <input type="number" class="form-control" name="hp" value="{{old('hp')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="website" value="{{old('website')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Penanggung Jawab</label>
                                        <select class="form-control" name="id_pj">
                                            <option value="">------</option>
                                            @foreach($user as $user)
                                                <option value="{{$user->id}}" @if(old('id_pj')===$user->id) selected @endif>{{$user->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" name="file">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div class="col-6 text-center">
                                        <a href="{{route('admin.partner.list')}}" class="btn btn-sm btn-danger">Back</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </div>
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
