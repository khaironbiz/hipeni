<div class="card p-2 w-100">
    <div class="card">
        <img src="{{url('assets/upload/images/user/'.$user->foto)}}" class="w-100 text-center"><br>
        <div class="card-header">
            <b>{{$user->name}}</b>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('forgot')}}">
                <li class="list-group-item @if($sub_class=='profile') active @endif ">Profile</li>
            </a>
            <li class="list-group-item">Pelatihan HIPENI</li>
            <li class="list-group-item">PKB</li>
            <a href="{{route('admin')}}">
                <li class="list-group-item">Admin Area</li>
            </a>
        </ul>
    </div>
</div>
