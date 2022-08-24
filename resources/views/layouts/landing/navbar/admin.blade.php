<div class="card p-2 w-100">
    <div class="card p-2">
        <div class="card-header">
            <a href="{{route('admin')}}"><b>{{$title}}</b></a>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('education.type')}}">
                <li class="list-group-item @if($class=='education') active @endif ">Pendidikan</li>
            </a>
            <a href="{{route('web')}}">
                <li class="list-group-item">Website</li>
            </a>
            <a href="{{route('event.list')}}">
                <li class="list-group-item">Events</li>
            </a>
            <a href="{{route('partner')}}">
                <li class="list-group-item">Partner</li>
            </a>
        </ul>
    </div>
</div>
