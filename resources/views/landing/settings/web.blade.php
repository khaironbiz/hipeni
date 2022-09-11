
@extends('layouts.landing.home')

@section('content')
    <!-- ======= Services Section ======= -->

    <section id="services" class="services services mt-5">
        <div class="row text-center mt-5">
            <h1>Konfigurasi Website</h1>
        </div>
        <div class="row justify-content-center mt-2">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('status'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ url('/settings') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2 row">
                                <div class="col-md-6">
                                    <label for="nama_web" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control @error('nama_web')is-invalid @enderror" id="nama_web" name="nama_web" value="{{old('nama_web')}}">
                                    @error('nama_web')

                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="singkatan" class="form-label">Singkatan</label>
                                    <input type="text" class="form-control @error('singkatan')is-invalid @enderror"  id="singkatan" name="singkatan" value="{{old('singkatan')}}">
                                    @error('singkatan')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-md-6">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="text" class="form-control @error('url')is-invalid @enderror" id="url" name="url" value="{{old('url')}}">
                                    @error('url')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email')is-invalid @enderror"  id="email" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control @error('logo')is-invalid @enderror" id="logo" name="logo">
                                    @error('logo')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-md-6">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select class="form-control @error('provinsi')is-invalid @enderror" name="provinsi" id="provinsi" required>
                                        <option value="">---------</option>
                                        @foreach($provinsi as $provinsi)
                                        <option value="{{$provinsi->code}}" @if(old('provinsi')==$provinsi->code) selected @endif id="{{$provinsi->code}}">{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Kota</label>
                                    <select name="kabupatenkota" id="kabupatenkota" class="form-control" required="required">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-md-6">
                                    <label for="url" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control @error('url')is-invalid @enderror" id="url" name="url" value="{{old('url')}}">
                                    @error('url')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Kelurahan</label>
                                    <input type="email" class="form-control @error('email')is-invalid @enderror"  id="email" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="desc" class="form-label">Deskripsi</label>
                                <textarea name="desc" class="my-editor form-control @error('desc')is-invalid @enderror" id="my-editor" cols="30" rows="10">{{old('desc')}}</textarea>
                                @error('desc')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('admin')}}" class="btn btn-danger">Back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

@endsection

