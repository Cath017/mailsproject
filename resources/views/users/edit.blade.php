@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6 offset-md-3 mt-5">
    <div class="card">
      <div class="card-header text-center pt-4"><h3>{{__('messages.edit_user')}}</h3></div>
      <div class="card-body">
        <form action="{{action('UsersController@update', $user->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <input type="text" name='name' placeholder="{{_('messages.name')}}" class="form-control" required value="{{$user->name}}">
          </div>
          <div class="form-group">
            <input type="email" name='email' placeholder="{{__('messages.email')}}" class="form-control" required value="{{$user->email}}">
          </div>
          <div class="form-group">
          <input type="password" name='password' placeholder="{{__('messages.pass')}}" class="form-control">
          </div>
          <div class="form-group">
            <select name="role">
              <option value="common_user">Common User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="{{__('messages.update_btn')}}" class="form-control btn btn-outline-success">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection