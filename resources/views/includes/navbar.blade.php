<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    {{-- Left Side of Navbar --}}
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">{{__('messages.nav_home')}} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link small" href="{{route('contacts.create')}}">{{__('messages.nav_create')}}</a>
      </li>
      {{-- Users link --}}
      @if(Auth::check())
        @if(Auth::user()->isAdmin())
          <li class="nav-item">
            <a class="nav-link small" href="{{route('users.index')}}">{{__('messages.users')}}</a>
          </li>
        @endif
      @endif
    </ul>
    {{-- Search Bar --}}
    <div class="sb-search" id="sb-search">
        <form class="form-inline my-2 my-lg-0" action="/search" method="get">
          <input class="form-control mr-sm-2 sb-search-input" type="search" name="search" placeholder="{{__('messages.nav_search')}}" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 sb-search-submit" type="submit">{{__('messages.nav_search')}}</button>
        </form>
    </div>
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
        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">{{__('messages.login')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">{{__('messages.register')}}</a></li>
      @else
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                {{__('messages.logout')}}
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