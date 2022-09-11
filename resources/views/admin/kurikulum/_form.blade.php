<div class="row justify-content-center">

    <div class="col-md-8">
        <div class="mb-3">
            <label>Training</label>
            <select class="form-control" name="training_id">
                <option value="">---</option>
                @foreach($training_all as $data)
                    <option value="{{$data->id}}" @if($data->id == $training_ini->id) selected @endif>{{$data->nama_training}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Topik Pembelajaran</label>
            <input type="text" class="form-control" name="topik" value="{{old('topik', $kurikulum->topik)}}" autofocus>
        </div>
        <div class="mb-3">
            <label>Type Materi</label>
            <select class="form-control" name="materi_type_id">
                <option value="">---</option>
                @foreach($materi_type as $data)
                <option value="{{$data->id}}" @if($data->id==$kurikulum->materi_type_id)selected @endif>{{$data->materi_type}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Penjelasan</label>
            <textarea name="penjelasan" class="my-editor form-control" id="my-editor">{{old('penjelasan', $kurikulum->penjelasan)}}</textarea>
        </div>
    </div>

</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
</script>
