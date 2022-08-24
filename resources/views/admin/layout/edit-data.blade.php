@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PT.LEASING MENGANGKASA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DATA KARYAWAN</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Silahkan Update Data karyawan</h3>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="/admin/data/update/{{$example->id}}"
                                  method="POST">
                                @csrf

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Nama Depan</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="text"class="form-control" name="nama_depan" value="{{ $example->nama_depan }}">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Nama Belakang</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="text"class="form-control" name="nama_belakang" value="{{ $example->nama_belakang }}">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <select class="form-control" name="jk">
                                                        <option value="">---pilih---</option>
                                                        <option value="L" <?php if($example->jk == "L"){echo "selected";}?>>Laki-laki</option>
                                                        <option value="P" <?php if($example->jk == "P"){echo "selected";}?>>Perempuan</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Tanggal Lahir</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="date"class="form-control" name="tl" value="{{ $example->tl }}">
                                                </div>
                                            </div>
                                            <div class="row mb-1">

                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">NIK</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="number"class="form-control" name="nik" value="{{ $example->nik }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Status</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <select class="form-control" name="status">
                                                        <option value="">---pilih---</option>
                                                        <option value="1" <?php if($example->status == "1"){echo "selected";}?>>Belum Menikah</option>
                                                        <option value="2" <?php if($example->status == "2"){echo "selected";}?>>Menikah</option>
                                                        <option value="3" <?php if($example->status == "3"){echo "selected";}?>>Cerai</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">User Name</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="text"class="form-control" name="username" value="{{ $example->username }}">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="email"class="form-control" name="email" value="{{ $example->email }}" >
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">HP</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="number"class="form-control" name="hp" value="{{ $example->hp }}">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Alamat</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <textarea class="form-control" name="alamat">{{ $example->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Update Foto</label>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <input type="file"class="form-control" name="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <img src="/assets/upload/images/nasabah/{{ $example->foto }}" class="w-50">
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6 text-right"><a href="/admin/data/show/{{$example->username}}" class="btn btn-info">Back</a></div>
                                        <div class="col-6 ">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
