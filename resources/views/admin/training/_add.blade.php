<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Tambah
</button>
{{--modal input--}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Create training data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form form id="quickForm" action="{{route('admin.training.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-1">
                        <label class="col-sm-4 col-form-label">Level</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="education_level">
                                <option value="">-----</option>
                                @foreach($education_level as $level)
                                    <option value="{{$level->id}}">{{$level->education_level}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label class="col-sm-4 col-form-label">Training</label>
                        <div class="col-sm-8">
                            <input type="text"class="form-control" name="nama_training" value="{{old('nama_training')}}">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-4 col-form-label">Icon</label>
                        <div class="col-sm-8">
                            <input type="text"class="form-control" name="icon">
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
