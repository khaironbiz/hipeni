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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Nama</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->nama_depan }} {{ $example->nama_belakang }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">
                                                <?php
                                                if($example->jk == "L"){echo "Laki-laki";
                                                }if($example->jk == "P"){echo "Perempuan";}
                                                ?>

                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->tl }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">NIK</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->nik }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Status</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">
                                                <?php
                                                if($example->status == "1"){echo "Belum Menikah";}
                                                elseif($example->status == "2"){echo "Menikah";}
                                                elseif($example->status == "3"){echo "Cerai";}
                                                else{echo "NULL";}
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">User Name</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->username }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->email }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">HP</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->hp }}</div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-md-4 col-lg-3 col-xl-2 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9 col-xl-10">{{ $example->alamat }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4"><a href="{{url('/admin/data')}}" class="btn btn-info">Back</a></div>
                                    <div class="col-4 text-center"><a href= "{{ url('/admin/data/' . $example->username)}}" button type="button" class="btn btn-success">Edit</a></div>
                                    <div class="col-4 text-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus Data?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="quickForm" action="/admin/data/delete/{{$example->id}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                <div class="row">
                                                    <label class="col-md-3">Nama</label>
                                                    <div class="col-md-9">: {{ $example->nama }}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-3">NIK</label>
                                                    <div class="col-md-9">: {{ $example->nik }}</div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-3">UserName</label>
                                                    <div class="col-md-9">: {{ $example->username }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"><input type="checkbox" required name="id_data"> Hapus Data Ini</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
