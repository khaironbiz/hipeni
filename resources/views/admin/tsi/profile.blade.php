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
                            @include('admin.sub_menu.user')

                            <!-- /.card-header -->
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
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <img src="{{url('assets/upload/images/user/'.$user->foto)}}" class="w-50"><br>
                                                <b>{{$user->name}}</b><br>
                                                {{$user->phone_cell}}<br>
                                                {{$user->email}}

                                            </div>
                                            <div class="card-footer text-center">

                                                <a href="/admin/user/edit/{{$user->username}}" class="btn btn-success btn-sm">Edit Profile</a>

                                            </div>

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
