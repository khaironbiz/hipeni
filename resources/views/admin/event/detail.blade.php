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
                            <!-- /.card-header -->
                            <div class="card-header">
                                {{$event->judul}}
                            </div>
                            <div class="card-body">
                                @if(\Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {!! \Session::get('success') !!}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row mb-3">
                                            <img src="{{asset('assets/upload/images/event/'.$event->banner)}}" class="w-100">
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <label>Tanggal Mulai</label><br>
                                                {{$event->date_mulai}}
                                            </div>
                                            <div class="col-md-6">
                                                <label>Tanggal Selesai</label><br>
                                                {{$event->date_selesai}}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <label>Harga</label><br>
                                                {{ number_format($event->harga)}}
                                            </div>
                                            <div class="col-md-6">
                                                <label>Kuota</label><br>
                                                {{ number_format($event->kuota)}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Tempat</label><br>
                                                {{$event->tempat}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Penyedia</label><br>
                                                {{$event->partner->nama_partner}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Judul</label><br>
                                                {{$event->judul}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Isi</label><br>
                                                {!! $event->isi !!}
                                            </div>
                                        </div>
                                        <div class="row mb-2">

                                            <div class="col-md-4">
                                                <label>Status</label><br>
                                                @if($event->status == 1)Publish <br>
                                                {{$event->date_publish}}
                                                @else Blokir @endif
                                            </div>

                                        </div>

                                        <div class="row">


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{route('admin.event')}}" class="btn btn-sm btn-info">Back</a>
                                <a href="{{route('admin.event.edit_event', ['slug'=>$event->slug])}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{route('admin.event')}}" class="btn btn-sm btn-danger">Delete</a>
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
