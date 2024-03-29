@extends('layouts.app')
@section('content')
  <div class="row mt-5">
    <div class="col-md-12">
      @if(count($contacts))
        <table class="table">
          <thead>
          <tr>
            <th>Id</th>
            <th>{{__('messages.first_name')}}</th>
            <th>{{__('messages.middle_name')}}</th>
            <th>{{__('messages.last_name')}}</th>
            <th>{{__('messages.address')}}</th>
            <th>{{__('messages.country')}}</th>
          </tr>
          </thead>
          <tbody>
          @foreach($contacts as $contact)
            <tr>
              <td>{{$contact->id}}</td>
              <td>{{$contact->first_name}}</td>
              <td>{{$contact->middle_name}}</td>
              <td>{{$contact->last_name}}</td>
              <td>{{$contact->address}}</td>
              <td>{{$contact->state}}</td>
              <td><a class="btn btn-outline-success" href="{{route('contacts.show',$contact->id)}}">{{__('messages.view_btn')}}</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
</div>
@stop
@section('scripts')
<script>
// Flash msg fade
$(document).ready(function(){
  $('#flash-message').delay(2000).fadeOut(2000);
});
</script>
@endsection



