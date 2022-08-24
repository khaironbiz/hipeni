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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Silahkan Menginput Data karyawan</h3>
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
              <form id="quickForm" action="{{ url('/admin/data/insert-data') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Nama Depan</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="text"class="form-control" name="nama_depan" placeholder="Masukan nama" value="{{ old('nama_depan') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Nama Belakang</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="text"class="form-control" name="nama_belakang" placeholder="Masukan nama" value="{{ old('nama_belakang') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <select class="form-control" name="jk">
                                        <option value="">---pilih---</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="date"class="form-control" name="tl" value="{{ old('tl') }}">
                                </div>
                            </div>
                            <div class="row mb-1">

                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">NIK</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="number"class="form-control" name="nik" placeholder="Masukan nomor KTP" value="{{ old('nik') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Status</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <select class="form-control" name="status">
                                        <option value="">---pilih---</option>
                                        <option value="1">Belum Menikah</option>
                                        <option value="2">Menikah</option>
                                        <option value="3">Cerai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">HP</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="number"class="form-control" name="hp" placeholder="Masukan nomor HP" value="{{ old('hp') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">User Name</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="text"class="form-control" name="username" placeholder="Masukan usernama" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="email"class="form-control" name="email" placeholder="Masukan email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Password</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="password"class="form-control" name="password" placeholder="Masukan password" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Re Password</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="password"class="form-control" name="password_confirmation" placeholder="Masukan kembali password" value="{{ old('password_confirmation') }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Foto</label>
                                <div class="col-md-8 col-lg-9 col-xl-10">
                                    <input type="file"class="form-control" name="file" placeholder="Upload Foto" value="{{ old('file') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
