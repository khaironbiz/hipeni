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
                           value="{{old('mulai', $user_job->mulai)}}">
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
                           value="{{old('selesai', $user_job->selesai)}}">
                    <label for="floatingInput">Selesai</label>
                </div>
                @error('selesai')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text"
                           class="form-control @error('posisi') is-invalid @enderror""
                           id="floatingInput"
                           placeholder="Posisi"
                           name="posisi"
                           value="{{old('posisi', $user_job->posisi)}}">
                    <label for="floatingInput">Posisi</label>
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
                           value="{{old('perusahaan', $user_job->perusahaan)}}">
                    <label for="floatingInput">Nama Perusahaan</label>
                </div>
                @error('perusahaan')
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
        <a href="{{route('profile')}}#pekerjaan" class="btn btn-info">Back</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
</div>

