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
                                @if($count <5)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Jawaban
                                    </button>

                                @endif
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                                    Edit Soal
                                </button>
                                <hr>

                                <label>{{ $question->pertanyaan }} ?</label>
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Opsi Jawaban</th>
                                            <th>Created_at</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <form action="{{ route('question.jawaban', ['slug' => $question->slug]) }}" method="post">
                                        @csrf
                                        <tbody>
                                        @foreach($answer as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><input type="radio" value="{{ $row->id }}" name="jawaban" @if($row->id == $question->jawaban) checked @endif> {{ $row->jawaban }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfooth>
                                            <td colspan="4" class="text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </td>
                                        </tfooth>
                                    </form>

                                </table>
                                <a href="{{ route('question.list', $question->training->slug) }}" class="btn btn-danger mt-2">Back</a>

{{--                               Modal Tambah Jawaban --}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Jawaban</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form form id="quickForm" action="{{ route('answer.store', ['slug' => $question->slug]) }}" method="POST">
                                                @csrf
                                            <div class="modal-body">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Opsi A</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control" name="a">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Opsi B</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control" name="b">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Opsi C</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control" name="c">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Opsi D</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control" name="d">
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-lg-3 col-form-label">Opsi E</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control" name="e">
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
{{--                            Modal Edit Soal--}}
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Input Soal</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('question.update', $question->slug) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <div class="col-md-4">
                                                            <label>Soal</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="pertanyaan" value="{{ $question->pertanyaan }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-md-4">
                                                            <label>Bobot</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" name="bobot" value="{{ $question->bobot }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Tipe Jawaban</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="answer_type_id" class="form-control">
                                                                <option value="">-----</option>
                                                                @foreach($answer_type as $row)
                                                                    <option value="{{$row->id}}" @if($row->id == $question->answer_type_id) selected @endif>{{$row->nama_jawaban}}</option>
                                                                @endforeach
                                                            </select>
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
