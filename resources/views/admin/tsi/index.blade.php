@extends('admin.tsi')
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
                                    <th>No.</th>
                                    <th>Key</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>TL</th>
                                    <th>Gender</th>
                                    <th>Telp</th>
                                    <th>Username</th>
                                    <th>ID Wallet</th>
                                    <th>ID Pengeluaran</th>
                                    <th>Foto</th>
                                    <th>Pemeriksaan</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $row)
                                <tr>
                                    <td>{{  $loop->iteration}}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{ $row['nama'] }}</td>
                                    <td>{{ $row['email'] }}</td>
                                    <td>{{ $row['birth_date'] }}</td>
                                    <td>@if(isset($row['gender'])){{ $row['gender'] }}@endif</td>
                                    <td>{{ $row['nomor_telepon'] }}</td>
                                    <td>@if(isset($row['username'])){{ $row['username'] }}@endif</td>
                                    <td>@if(isset($row['wallet_id'])){{ $row['wallet_id'] }}@endif</td>
                                    <td>@if(isset($row['wallet_id'])){{ $row['wearable_id'] }}@endif</td>
                                    <td>@if(isset($row['foto'])){{ $row['foto'] }}@endif</td>
                                    <td>@if(isset($row['health_overview'])){{ count($row['health_overview']) }}@endif</td>

                                </tr>
                                @endforeach
                            </table>

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
