@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
  @if(count($users))
<table class="table">
  <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td><a class="btn btn-outline-primary" href="{{route('users.edit', $user->id)}}">{{__('messages.update_btn')}}</a></td>
    <td>
      <form class="delete" action="{{action('UsersController@destroy', $user->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @method('DELETE')
        <input type="submit" value="{{__('messages.delete_btn')}}" class="btn btn-outline-danger">
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>

@endif
    </div>
  </div>
</div>
@endsection