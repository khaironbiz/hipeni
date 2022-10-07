
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{route('admin.training')}}">Training</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-white <?php if($class == 'User'){echo 'active';}?>" href="{{route('admin.materi.type')}}">Tipe Materi</a>
                <a class="nav-link text-white <?php if($class == 'Profesi'){echo 'active';}?>" href="{{route('admin.study.methode')}}">Metode Belajar</a>
                <a class="nav-link text-white <?php if($class == 'Organisasi'){echo 'active';}?>" href="{{route('admin.kurikulum')}}">Kurikulum</a>
                <a class="nav-link text-white @if($class == 'website') active text-danger @else text-white @endif" href="{{route('admin.kurikulum.materi')}}">Materi</a>
            </div>
        </div>
    </div>
</nav>
<hr>