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
                                                @if($event->status == 1)Publish ---
                                                {{$event->date_publish}}
                                                @else Blokir @endif
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Materi Pelatihan</b><br>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                    Input Materi
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Input Materi</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <button class="btn btn-primary btn-sm">Input dari Kurikulum</button>
                                                                <button class="btn btn-success btn-sm">Input Manual</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-sm mt-2">
                                                    <thead>
                                                    <th>#</th>
                                                    <th>Materi</th>
                                                    <th>JPL</th>
                                                    <th>Aksi</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Akreditasi Prtofesi (SKP)</b><br>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#SKP">
                                                    Input SKP
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="SKP" tabindex="-1" aria-labelledby="SKPLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="SKPLabel">Input SKP</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('event.skp.store') }}" method="post">
                                                              @csrf
                                                            <div class="modal-body">
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Event</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select class="form-control form-control-sm" name="event_id">
                                                                            <option value="{{ $event->id }}">{{$event->judul}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                       <b>Organisasi Profesi</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select class="form-control form-control-sm" name="organisasi_profesi_id" required>
                                                                            <option value="">----</option>
                                                                            @foreach($op as $op)
                                                                            <option value="{{$op->id}}">{{ $op->singkatan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Peserta</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" class="form-control form-control-sm" name="peserta" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Pembicara</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" class="form-control form-control-sm" name="pembicara" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Moderator</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" class="form-control form-control-sm" name="moderator" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Panitia</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" class="form-control form-control-sm" name="panitia" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Nomor SKP</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control form-control-sm" name="no_skp" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Tanggal SKP</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="date" class="form-control form-control-sm" name="tgl_skp" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-md-4">
                                                                        <b>Keterangan</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control form-control-sm" name="keterangan">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-sm mt-2">
                                                        <thead>
                                                        <th>#</th>
                                                        <th>Organisasi Profesi</th>
                                                        <th>Kredit Profesi</th>

                                                        <th>Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($skp as $skp)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                    {{ $skp->op->singkatan }} <br>
                                                                    {{ $skp->no_skp }} <br> {{ $skp->tgl_skp  }} <br> {{$skp->keterangan}} <br>
                                                                </td>
                                                                <td>
                                                                    Peserta : {{$skp->peserta}} <br>
                                                                    Pembicara : {{$skp->pembicara}} <br>
                                                                    Moderator : {{$skp->moderator}} <br>
                                                                    Panitia : {{$skp->panitia}}
                                                                </td>

                                                                <td>
                                                                    <a href="" class="btn btn-sm btn-info">Detail</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

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
