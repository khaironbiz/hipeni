<div class="card p-2 w-100">
    <div class="card p-2">
        <div class="card-header">
            <a href="{{route('admin')}}"><b>{{$title}}</b></a>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('home.wilayah')}}">
                <li class="list-group-item @if($sub_class=='provinsi') active @endif ">Provinsi</li>
            </a>
            <li class="list-group-item">Profesi</li>
            <li class="list-group-item">PKB</li>
            <li class="list-group-item">Admin Area</li>
        </ul>
    </div>
</div>
