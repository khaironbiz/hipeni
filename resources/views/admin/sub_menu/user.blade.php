
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{url('admin')}}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-white <?php if($class == 'User'){echo 'active';}?>" href="{{url('admin/user')}}">User</a>
                <a class="nav-link text-white <?php if($class == 'Profesi'){echo 'active';}?>" href="{{url('admin/profesi')}}">Profesi</a>
                <a class="nav-link text-white <?php if($class == 'Organisasi'){echo 'active';}?>" href="{{url('admin/organisasi')}}">Organisasi</a>
                <a class="nav-link text-white @if($class == 'website') active text-danger @else text-white @endif" href="/admin/website">Website</a>
                <a class="nav-link @if($class == 'categories') active text-danger @else text-white @endif" href="{{route('admin.video.categoty')}}">Video Categories</a>
                <a class="nav-link @if($class == 'partner') active text-danger @else text-white @endif" href="{{route('admin.partner.list')}}">Partner</a>
                <a class="nav-link @if($class == 'trainings') active text-danger @else text-white @endif" href="{{route('admin.training')}}">Training</a>
            </div>
        </div>
    </div>
</nav>
<hr>
