@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
      <form action="{{action('ContactsController@store')}}" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" name='first_name' placeholder="First Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name='middle_name' placeholder="Middle Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name='last_name' placeholder="Last Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name='address' placeholder="Address" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name='state' placeholder="State" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" value="Create" class="form-control btn btn-outline-success">
        </div>
      </form>
    </div>
  </div>
</div>
@stop
