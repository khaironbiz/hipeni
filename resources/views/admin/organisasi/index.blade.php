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
                            <li class="breadcrumb-item"><a href="{{url('admin/organisasi/')}}">{{$class}}</a></li>
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
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                                    Tambah
                                </button>
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Profesi</th>
                                        <th>Organisasi</th>
                                        <th>Slug</th>
                                        <th>Count</th>
                                        <th>Created_at</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($x=1)
                                    @foreach($organisasi as $organisasi)
                                        <tr>
                                            <td>{{$x++}}</td>
                                            <td>{{$organisasi->profesi->nama_profesi}}</td>
                                            <td>{{$organisasi->nama_op}}</td>
                                            <td>{{$organisasi->slug_op}}</td>
                                            <td></td>
                                            <td>{{$organisasi->created_at}}</td>
                                            <td>
                                                <a href="/admin/organisasi/show/{{$organisasi->slug_op}}" class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Organisasi Profesi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form form id="quickForm" action="{{ url('/admin/organisasi/store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Nama Profesi</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <select class="form-control" name="id_profesi">
                                                                        <option value="">---pilih---</option>
                                                                        @foreach($profesi as $profesi)
                                                                        <option value="{{$profesi->id}}">{{$profesi->nama_profesi}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Organisasi</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="nama_op">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Pimpinan</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="pimpinan">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Singkatan</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="singkatan">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Email</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">HP</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="hp">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Telp</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="telp">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Website</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <input type="text"class="form-control" name="web">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-1">
                                                                <label class="col-sm-6 col-md-4 col-lg-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

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
                            </div>
                            <!-- /.card-body -->
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
