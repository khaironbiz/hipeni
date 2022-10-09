<div class="col-md-8">
    <div class="row mb-2">
        <div class="col-md-6">
            <label>Training</label><br>
            <select class="form-control @error('training_id') is-invalid text-danger @enderror" name="training_id">
                <option value="" @if(old('training_id', $event->education_level) == "") selected @endif>-----------</option>
                @foreach($training as $data)
                    <option value="{{$data->id}}" @if(old('training_id', $event->training_id) == $data->id) selected @endif>{{$data->nama_training}}</option>
                @endforeach
            </select>
            @error('training_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Penyedia</label><br>
            <select class="form-control @error('id_penyelenggara') is-invalid text-danger @enderror" name="id_penyelenggara">
                <option value="" @if(old('id_penyelenggara', $event->id_penyelenggara) == "") selected @endif>-----------</option>
                @foreach($partner as $data)
                    <option value="{{$data->id}}" @if(old('id_penyelenggara', $event->id_penyelenggara) == $data->id) selected @endif>{{$data->nama_partner}}</option>
                @endforeach
            </select>
            @error('id_penyelenggara')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Judul</label><br>
            <input class="form-control @error('judul') is-invalid text-danger @enderror" type="text" name="judul" value="{{old('judul', $event->judul)}}">
            @error('judul')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-md-12">
            <label>Ringkasan</label><br>
            <textarea class="form-control @error('ringkasan') is-invalid text-danger @enderror" cols="30" rows="3" name="ringkasan">{{old('ringkasan', $event->ringkasan)}}</textarea>
            @error('ringkasan')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-12">
            <label>Isi</label><br>
            <textarea class="form-control" id="konten" cols="30" rows="10" name="isi">{!! old('isi', $event->isi) !!}</textarea>
            @error('isi')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Tanggal Publish</label><br>
            <input type="date" class="form-control @error('date_publish') is-invalid text-danger @enderror" name="date_publish" value="{{ old('date_publish', $event->date_publish) }}">
            @error('date_publish')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>Status</label><br>
            <select class="form-control @error('status') is-invalid text-danger @enderror" name="status">
                <option value="" @if(old('status', $event->status) == '') selected @endif>---------</option>
                <option value="0" @if(old('status', $event->status) == 0) selected @endif>Blokir</option>
                <option value="1" @if(old('status', $event->status) == 1) selected @endif>Publish</option>
            </select>
            @error('status')
            <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>
        <div class="col-md-3">
            <label>Tanggal Mulai</label><br>
            <input type="date" class="form-control @error('date_mulai') is-invalid text-danger @enderror" name="date_mulai" value="{{ old('date_mulai', $event->date_mulai)}}">
            @error('date_mulai')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>Tanggal Selesai</label><br>
            <input type="date" class="form-control" name="date_selesai" value="{{ old('date_selesai', $event->date_selesai) }}">
            @error('date_selesai')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label>Tempat</label><br>
        <input class="form-control" name="tempat" value="{{ old('tempat', $event->tempat)}}">
        @error('tempat')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Harga Dasar</label><br>
            <input type="number" class="form-control" name="harga" value="{{old('harga', $event->harga)}}">
            @error('harga')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label>Kuota</label><br>
            <input type="number" class="form-control" name="kuota" value="{{ old('kuota', $event->kuota)}}">
            @error('kuota')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Banner</label><br>
            <input type="file" class="form-control" accept="image/*" name="banner">
            @error('banner')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
