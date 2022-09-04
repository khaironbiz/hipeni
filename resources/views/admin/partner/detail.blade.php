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
                                {{$partner->nama_partner}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <img class="img-thumbnail" src="{{asset('assets/upload/images/partners/'.$partner->logo)}}">
                                    </div>
                                    <div class="col-md-8 mt-3">
                                        <div class="row">
                                            <label class="col-sm-3">Nama</label>
                                            <div class="col-sm-9">{{$partner->nama_partner}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Singkatan</label>
                                            <div class="col-sm-9">{{$partner->singkatan}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Email</label>
                                            <div class="col-sm-9">{{$partner->email}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">HP</label>
                                            <div class="col-sm-9">{{$partner->hp}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Website</label>
                                            <div class="col-sm-9">{{$partner->website}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Penanggung Jawab</label>
                                            <div class="col-sm-9">{{$partner->nama_pj}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Nomor Perjanjian</label>
                                            <div class="col-sm-9">{{$partner->nomor_sk}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Tanggal Perjanjian</label>
                                            <div class="col-sm-9">{{$partner->tanggal_sk}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3">Valid To</label>
                                            <div class="col-sm-9">{{$partner->valid_to}}</div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.partner.list')}}" class="btn btn-sm btn-primary">Back</a>
                                <a href="{{route('admin.partner.edit',['slug'=>$partner->slug])}}" class="btn btn-sm btn-success">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi menghapus data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('partner.destroy',['id'=>$partner->id])}}" method="post">
                                                @csrf
                                            <div class="modal-body">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <td class="w-25">Nama Partner</td>
                                                        <td class="text-right">:</td>
                                                        <td>{{$partner->nama_partner}} ({{$partner->singkatan}})</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25">Penanggung Jawab</td>
                                                        <td class="text-right">:</td>
                                                        <td>{{$partner->nama_pj}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25">Email</td>
                                                        <td class="text-right">:</td>
                                                        <td>{{$partner->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25">HP</td>
                                                        <td class="text-right">:</td>
                                                        <td>{{$partner->hp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25">Website</td>
                                                        <td class="text-right">:</td>
                                                        <td>{{$partner->website}}</td>
                                                    </tr>
                                                </table>
                                                <label>
                                                    <input type="checkbox" required> Saya menyetujui untuk menghapus data diatas
                                                </label>

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
