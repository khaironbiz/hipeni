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
                                    <th>No.</th>
                                    <th>Type</th>
                                    <th>Topik</th>
                                    <th>Penjelasan</th>
                                    <th>Aksi</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kurikulum as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->materi_type}}</td>
                                    <td>{{$data->topik}}</td>
                                    <td>{{$data->penjelasan}}</td>
                                    <td><a href="" class="btn btn-sm btn-info">Detail</a></td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
{{--                                modal input--}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Create training data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form form id="quickForm" action="{{route('admin.kurikulum.store')}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <label>Training</label>
                                                       <select class="form-control" name="training_id">
                                                           <option value="{{$training->id}}">{{$training->nama_training}}</option>
                                                       </select>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label>Type Materi</label>
                                                        <select class="form-control" name="materi_type">
                                                            <option value="">----</option>
                                                            @foreach($materi_type as $data)
                                                                <option value="{{$data->id}}">{{$data->materi_type}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label>Topik</label>
                                                        <input type="text"class="form-control" name="topik" value="{{old('topik')}}">
                                                    </div>
                                                    <div class="row mb-1">
                                                        <label>Penjelasan</label>
                                                        <textarea class="form-control" rows="3" name="penjelasan">{{old('penjelasan')}}</textarea>
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
