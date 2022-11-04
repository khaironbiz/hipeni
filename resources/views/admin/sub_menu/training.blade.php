
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand @if($class == 'trainings') active text-danger @else text-white @endif" href="{{route('admin.training')}}">Training</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link @if($class == 'matery_type') active text-danger @else text-white @endif" href="{{route('admin.materi.type')}}">Tipe Materi</a>
                <a class="nav-link @if($class == 'study_method') active text-danger @else text-white @endif" href="{{route('admin.study.methode')}}">Metode Belajar</a>
                <a class="nav-link @if($class == 'kurikulum') active text-danger @else text-white @endif" href="{{route('admin.kurikulum')}}">Kurikulum</a>
                <a class="nav-link @if($class == 'materi') active text-danger @else text-white @endif" href="{{route('admin.kurikulum.materi')}}">Materi</a>
                <a class="nav-link @if($class == 'answer') active text-danger @else text-white @endif" href="{{route('answer_type.index')}}">Tipe Jawaban</a>
                <a class="nav-link @if($class == 'Soal') active text-danger @else text-white @endif" href="{{route('question')}}">Bank Soal</a>
            </div>
        </div>
    </div>
</nav>
<hr>
