@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
      <form action="{{action('ContactsController@update', $contact->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group">
          <input type="text" name='first_name' placeholder="First Name" class="form-control" value="{{$contact->first_name}}">
          </div>
          <div class="form-group">
              <input type="text" name='middle_name' placeholder="Middle Name" class="form-control" value="{{$contact->middle_name}}">
          </div>
          <div class="form-group">
              <input type="text" name='last_name' placeholder="Last Name" class="form-control" value="{{$contact->last_name}}">
          </div>
          <div class="form-group">
              <input type="text" name='address' placeholder="Address" class="form-control" value="{{$contact->address}}">
          </div>
          <div class="form-group">
              <input type="text" name='state' placeholder="State" class="form-control" value="{{$contact->state}}">
          </div>
          <div class="form-group">
            <input type="submit" value="Edit Contact" class="form-control btn btn-outline-success">
          </div>
        </form>
      </div>
    </div>
  </div>
  @stop