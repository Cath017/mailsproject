@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif


{{-- Unauthorized page --}}
@if (Session::has('error'))
  <div id="flash-message" class="alert alert-danger">
    {{ Session::get('error') }}
  </div>
@endif
