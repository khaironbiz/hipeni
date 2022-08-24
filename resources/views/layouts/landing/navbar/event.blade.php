
<div class="card p-2">
    <div class="card">
        <img src="{{asset('assets/upload/images/event/'.$event->banner)}}" class="w-100">
        <div class="card-header">
            Kelas
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('home.event.detail',['slug'=>$event->slug])}}">
                <li class="list-group-item @if($sub_class === 'detail') active @endif">Detail</li>
            </a>
            <li class="list-group-item">Materi</li>
            <li class="list-group-item">Pendaftaran</li>
        </ul>
    </div>
</div>
