@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6 offset-md-3 mt-5">
    <div class="card">
      <div class="card-header text-center pt-4"><h3>Create User</h3></div>
      <div class="card-body">
        <form action="{{action('UsersController@store')}}" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" name='name' placeholder="Name" class="form-control" required>
          </div>
          <div class="form-group">
              <input type="email" name='email' placeholder="Email" class="form-control" required>
          </div>
          <div class="form-group">
              <input type="password" name='password' placeholder="Password" class="form-control" required>
          </div>
          <div class="form-group">
            <input type="submit" value="{{__('messages.create_btn')}}" class="form-control btn btn-outline-success">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection