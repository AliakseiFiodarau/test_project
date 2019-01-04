@section('registerBar')
    <div class="register">
        @guest
            <div class="upper_avatar"><img src={{asset("storage/users/anonimous_black.png")}}></div>
            <div class="register_buttons">
                <div id="register_button">
                    <a href="{{url('login')}}">
                        login
                    </a>
                </div>
                <div id="register_button">
                    <a href="{{url('register')}}">
                        register
                    </a>
                </div>
            </div>
        @else
            <div class="upper_avatar"><img src={{asset('storage/'.Auth::user()->avatar)}}></div>
            <div class="register_buttons">
                <div id="register_button">
                    <a href="{{route('user', Auth::user()->id)}}">
                        {{(Auth::user()->name)}}
                    </a>
                </div>
                <div id="register_button">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
@show
