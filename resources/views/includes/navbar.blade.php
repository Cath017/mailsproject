<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
{{-- Left Side of Navbar --}}
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">{{__('messages.nav_home')}} <span class="sr-only">(current)</span></a>
      </li>
    </ul>
{{-- Search Bar --}}
    <form class="form-inline my-2 my-lg-0" action="/search" method="get">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('messages.nav_search')}}" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('messages.nav_search')}}</button>
    </form>
{{-- Right Side of navbar --}}
    {{-- Dropdown language --}}
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown small">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{__('messages.nav_lang')}} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/lang/en"><img src="{{asset('images/eng.png')}}" width=30 height=20> {{__('messages.en')}}</a>
          <a class="dropdown-item" href="/lang/sk"><img src="{{asset('images/sk.png')}}" width=30 height=20> {{__('messages.sk')}}</a>
        </div>
      </li>
      {{-- Authentification links --}}
      @if(Auth::guest())
        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
      @else
        <li class="nav-item">
          <a class="nav-link small" href="{{route('contacts.create')}}">{{__('messages.nav_create')}}</a>
        </li>
        <li class="nav-item dropdown small">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Users <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/users">All Users</a>
              <a class="dropdown-item" href="/users/create">Create</a>
            </div>
          </li>
        
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
</nav>