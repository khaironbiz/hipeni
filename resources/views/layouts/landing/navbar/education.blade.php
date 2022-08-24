<div class="card p-2 w-100">
    <div class="card">

        <div class="card-header">
            <a href="{{route('admin')}}"><b>Admin Area</b></a>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('education.type')}}">
                <li class="list-group-item @if($sub_class === "type") active @endif">Type</li>
            </a>
            <a href="{{route('education.level')}}">
                <li class="list-group-item @if($sub_class === "level") active @endif">Level</li>
            </a>

            <li class="list-group-item">PKB</li>
        </ul>
    </div>
</div>
