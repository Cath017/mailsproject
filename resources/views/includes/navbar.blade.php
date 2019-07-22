<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{__('messages.nav_lists')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">{{__('messages.nav_home')}} <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('contacts.create')}}">{{__('messages.nav_create')}}</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/search" method="get">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('messages.nav_search')}}" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('messages.nav_search')}}</button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{__('messages.nav_lang')}} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="lang/en">{{__('messages.en')}}</a>
                <a class="dropdown-item" href="lang/sk">{{__('messages.sk')}}</a>
            </div>
        </li>
    </ul>
    </div>
  </nav>