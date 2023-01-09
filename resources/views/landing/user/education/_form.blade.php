<div class="card-body">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="form-floating mb-3">
                <select class="form-select @error('education_level_id') is-invalid @enderror" aria-label="Floating label select example" name="education_level_id">
                    <option value="">----pilih----</option>
                    @foreach($pendidikan as $p)
                        <option value="{{$p->id}}" @if($p->id == old('education_level_id') || $p->id==$education_user->level_pendidikan) selected @endif>{{$p->education_level}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Level Pendidikan</label>
                @error('education_level_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

        </div>

        <div class="col-md-6">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ old('program_studi', $education_user->program_studi) }}">
                <label for="floatingInput">Jurusan</label>
                @error('program_studi')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('institusi') is-invalid @enderror" name="institusi" value="{{ old('institusi', $education_user->institusi) }}">
                <label for="floatingInput">Intitusi Pendidikan</label>
                @error('institusi')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="date" class="form-control @error('tahun_lulus') is-invalid @enderror" name="tahun_lulus" value="{{ old('tahun_lulus', $education_user->tahun_lulus) }}">
                <label for="floatingInput">Tahun Lulus</label>
                @error('tahun_lulus')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('nomor_ijazah') is-invalid @enderror" name="nomor_ijazah" value="{{ old('nomor_ijazah', $education_user->nomor_ijazah) }}">
                <label for="floatingInput">Nomor Ijazah</label>
                @error('nomor_ijazah')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('ttd_ijazah') is-invalid @enderror" name="ttd_ijazah" value="{{ old('ttd_ijazah', $education_user->ttd_ijazah) }}">
                <label for="floatingInput">Penanda Tangan Ijazah</label>
                @error('ttd_ijazah')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <select class="form-select @error('pendidikan_terahir') is-invalid @enderror" name="pendidikan_terahir">
                    <option value="">----pilih----</option>
                    <option value="0" @if(old('pendidikan_terahir')==0 || $education_user->level_pendidikan==0) selected @endif>Tidak</option>
                    <option value="1" @if(old('pendidikan_terahir')==1 || $education_user->level_pendidikan==1) selected @endif>Ya</option>
                </select>
                <label for="floatingSelect">Apakah Pendidikan Terahir?</label>
                @error('pendidikan_terahir')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="floatingInput" name="file">
                <label for="floatingInput">File Ijazah</label>
                @error('file')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
