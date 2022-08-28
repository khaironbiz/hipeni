<div class="card w-100">
    <div class="card-header bg-danger text-white">
        <b>Apakah anda yakin menghapus data berikut</b>
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
                            name="sebagai">
                        <option value="" @if($organisasi->sebagai == "" | old('sebagai')=="") selected @endif>----pilih----</option>
                        <option value="0" @if($organisasi->sebagai == 0 | old('sebagai')==0) selected @endif>Anggota</option>
                        <option value="1" @if($organisasi->sebagai == 1 | old('sebagai')==1) selected @endif>Pengurus</option>
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
                           class="form-control @error('nama_organisasi') is-invalid @enderror"
                           id="floatingInput"
                           placeholder="Perusahaan"
                           name="nama_organisasi"
                           value="{{old('nama_organisasi', $organisasi->nama_organisasi)}}">
                    <label for="floatingInput">Nama Organisasi</label>
                </div>
                @error('nama_organisasi')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <select class="form-select @error('active') is-invalid @enderror"
                            id="floatingSelect"
                            aria-label="Floating label select example"
                            name="active">
                        <option value="" @if($organisasi->active == "" or old('active') =="") selected @endif>----pilih----</option>
                        <option value="0" @if($organisasi->active == 0 or old('active') ==0) selected @endif>Tidak Aktif</option>
                        <option value="1" @if($organisasi->active == 1 or old('active') ==1) selected @endif>Aktif</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                </div>
                @error('active')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text"
                           class="form-control @error('keterangan') is-invalid @enderror"
                           id="floatingInput"
                           name="keterangan" value="{{$organisasi->keterangan}}">
                    <label for="floatingInput">Keterangan</label>
                </div>
                @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                <label class="form-check-label">
                    Saya setuju untuk menghapus data ini
                </label>
            </div>
        </div>
    </div>
    <div class="card-footer text-center mt-5">
        <a href="{{route('profile')}}#organisasi" class="btn btn-info">Back</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
</div>

