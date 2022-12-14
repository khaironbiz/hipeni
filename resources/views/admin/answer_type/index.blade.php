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

                    <!-- /.card -->

                    <div class="card">
                        @include('admin.sub_menu.training')
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
                                        <th>Tipe Jawaban</th>
                                        <td>Form</td>
                                        <th>Slug</th>
                                        <th>Count</th>
                                        <th>Created_at</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($answer_type as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama_jawaban }}</td>
                                            <td>
                                                @if($row->tipe_jawaban != 'select' and $row->tipe_jawaban != 'textarea')
                                                <input type="{{$row->tipe_jawaban}}">
                                                @elseif($row->tipe_jawaban == 'textarea')
                                                <textarea></textarea>
                                                @elseif($row->tipe_jawaban == 'select')
                                                <select>
                                                    <option></option>
                                                </select>
                                                @endif
                                            </td>
                                            <td>{{ $row->slug }}</td>
                                            <td></td>
                                            <td>{{ $row->created_at }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Profesi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form form id="quickForm" action="{{ route('answer_type.store') }}" method="POST">
                                                @csrf
                                            <div class="modal-body">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Nama Jawaban</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text"class="form-control" name="nama_jawaban">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Type Jawaban</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text"class="form-control" name="tipe_jawaban">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Multiple Answer</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <select name="multiple" class="form-control">
                                                            <option value="0">Tidak</option>
                                                            <option value="1">Ya</option>
                                                        </select>
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
