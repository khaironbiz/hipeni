
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Doctors Section ======= -->
    <section id="video" class="doctors section-bg mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$title}}</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex mb-2">
                    @include('layouts.landing.navbar.user')
                </div>
                <div class="col-md-8 d-flex">
                    <div class="card p-2 w-100">
                        <div class="card mb-2">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6"><b>Data Diri</b></div>
                                    <div class="col-6 text-end"><a href="{{route('profile.edit')}}" class="btn btn-sm btn-success">Edit</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->nama_lengkap}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->nik}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->tgl_lahir}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-9 col-8">: @if($user->jk=1) Laki-laki @elseif($user->jk=2) Perempuan @else Lainnya @endif</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>NIRA</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->nira}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->email}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->username}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 col-4">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-9 col-8">: {{$user->phone_cell}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>Riwayat Pendidikan</b>
                            </div>

                            <div class="card-body">
                                <a href="{{route('education.user.create')}}" class="btn btn-sm btn-primary mb-2">Tambah Data</a>
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <th>#</th>
                                        <th>Level Pendidikan</th>
                                        <th>Program Studi</th>
                                        <th>Tahun Lulus</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                    @foreach($pendidikan as $p)
                                        <tr @if($p->pendidikan_terahir === 1) class='bg-warning text-dark' @endif>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->education_level->education_level}}</td>
                                            <td>{{$p->program_studi}}</td>
                                            <td>{{$p->tahun_lulus}}</td>
                                            <td>
                                                <a href="{{route('education.user.show',['slug'=>$p->slug])}}" class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card mb-2" id="pekerjaan">
                            <div class="card-header">
                                <b>Riwayat Pekerjaan</b>
                            </div>
                            <div class="card-body">
                                <a href="{{route('user.job.create')}}" class="btn btn-sm btn-primary mb-2">Tambah</a>
                                <table class="table table-striped" id="example1">
                                    <thead>
                                    <th>#</th>
                                    <th>Periode</th>
                                    <th>Posisi</th>
                                    </thead>
                                    <tbody>
                                    @foreach($user_job as $data )

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->mulai}} <br> {{$data->selesai}}</td>
                                                <td><a href="{{route('user.job.edit', ['slug' => $data->slug])}}"> {{$data->posisi}} <br> {{$data->perusahaan}} </a></td>
                                            </tr>


                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                <b>Riwayat Organisasi</b>
                            </div>
                            <div class="card-body">
                                <a href="{{route('user.organisasi.create')}}" class="btn btn-sm btn-primary">Tambah</a>
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <th>#</th>
                                        <th>Periode</th>
                                        <th>Organisasi</th>
                                    </thead>
                                    <tbody>
                                    @foreach($organisasi as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->mulai}} <br> {{$data->selesai}}</td>
                                            <td>
                                                @if($data->sebagai==1) Anggota
                                                @else
                                                    Pengurus
                                                @endif
                                                    <br>
                                                {{$data->nama_organisasi}}
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
    </section>
    <!-- End Doctors Section -->
@endsection
