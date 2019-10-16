@auth
    <span class="badge badge-info">{{ Auth::user()->name }}</span>
    <a class="btn btn-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <a style="color:#FFF" href="{{route('login')}}">
        <i class="fas fa-user"></i>
    </a>
@endauth