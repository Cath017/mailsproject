@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
      <form action="{{action('ContactsController@update', $contact->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="first_name">{{__('messages.first_name')}}</label>
          <input type="text" name='first_name' class="form-control" value="{{$contact->first_name}}">
          </div>
          <div class="form-group">
            <label for="middle_name">{{__('messages.middle_name')}}</label>
            <input type="text" name='middle_name' class="form-control" value="{{$contact->middle_name}}">
          </div>
          <div class="form-group">
            <label for="last_name">{{__('messages.last_name')}}</label>
            <input type="text" name='last_name' class="form-control" value="{{$contact->last_name}}">
          </div>
          <div class="form-group">
            <label for="address">{{__('messages.address')}}</label>
            <input type="text" name='address' class="form-control" value="{{$contact->address}}">
          </div>
          <div class="form-group">
            <label for="country">{{__('messages.country')}}</label>
            <input type="text" name='state' class="form-control" value="{{$contact->state}}">
          </div>
          <div class="form-group">
            <input type="submit" value="{{__('messages.update_btn')}}" class="form-control btn btn-outline-success">
          </div>
        </form>
      </div>
    </div>
  </div>
  @stop