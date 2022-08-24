<div class="card p-2 w-100">
    <div class="card">

        <div class="card-header">
            <b>{{$class}}</b>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('login')}}">
                <li class="list-group-item @if($sub_class=='login') active @endif ">Login</li>
            </a>
            <a href="{{route('registration')}}">
                <li class="list-group-item @if($sub_class=='registration') active @endif ">Registration</li>
            </a>
            <a href="{{route('forgot')}}">
                <li class="list-group-item @if($sub_class=='forgot') active @endif ">Forgot Password</li>
            </a>


        </ul>
    </div>
</div>
