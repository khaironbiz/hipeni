<div class="card w-100">
    <div class="card-header">
        <b>{{$title}}</b>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="date"
                           class="form-control @error('mulai') is-invalid @enderror"
                           id="floatingInput"
                           placeholder="Mulai"
                           name="mulai"
                           value="{{old('mulai', $organisasi->mulai)}}">
                    <label for="floatingInput">Mulai</label>
                </div>

                @error('mulai')
                <small class="text-danger">{{ $message }}</small>
                @enderror


            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="date"
                           class="form-control @error('selesai') is-invalid @enderror"
                           id="floatingInput"
                           placeholder="selesai"
                           name="selesai"
                           value="{{old('selesai', $organisasi->selesai)}}">
                    <label for="floatingInput">Selesai</label>
                </div>
                @error('selesai')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <select class="form-select"
                            id="floatingSelect"
                            aria-label="Floating label select example"
                            name="active">
                        <option value="" @if($organisasi->sebagai === "") selected @endif>----pilih----</option>
                        <option value="0" @if($organisasi->sebagai === 0) selected @endif>Anggota</option>
                        <option value="1" @if($organisasi->sebagai === 1) selected @endif>Pengurus</option>
                    </select>
                    <label for="floatingInput">Sebagai</label>
                </div>

                @error('posisi')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text"
                           class="form-control @error('perusahaan') is-invalid @enderror""
                           id="floatingInput"
                           placeholder="Perusahaan"
                           name="perusahaan"
                           value="{{old('perusahaan', $organisasi->nama_organisasi)}}">
                    <label for="floatingInput">Nama Organisasi</label>
                </div>
                @error('perusahaan')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <select class="form-select"
                            id="floatingSelect"
                            aria-label="Floating label select example"
                            name="active">
                        <option value="" @if($organisasi->active === "") selected @endif>----pilih----</option>
                        <option value="0" @if($organisasi->active === 0) selected @endif>Tidak Aktif</option>
                        <option value="1" @if($organisasi->active === 1) selected @endif>Aktif</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="file"
                           class="form-control"
                           id="floatingInput"
                           name="file">
                    <label for="floatingInput">Data Dukung</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-center mt-5">
        <a href="{{route('profile')}}#pekerjaan" class="btn btn-info">Back</a>
        <button type="submit" class="btn @if($submit ==='Update') btn-success @else btn-primary @endif">{{$submit}}</button>
        @if($submit ==='Update')
            <a href="{{route('user.job.delete', ['slug'=>$user_job->slug])}}" class="btn btn-danger">Delete</a>
        @endif
    </div>
</div>

