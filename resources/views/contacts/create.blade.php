@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
      <div class="card">
        <div class="card-header text-center pt-4"><h2>Create Contact Adress</h2></div>
        <div class="card-body">
          <form action="{{action('ContactsController@store')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" name='first_name' placeholder="{{__('messages.first_name')}}" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name='middle_name' placeholder="{{__('messages.middle_name')}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name='last_name' placeholder="{{__('messages.last_name')}}" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name='address' placeholder="{{__('messages.address')}}" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name='state' placeholder="{{__('messages.country')}}" class="form-control" required>
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
@stop
