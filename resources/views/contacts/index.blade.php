@extends('layouts.app')
@section('content')
  <div class="row mt-5">
    <div class="col-md-12">
  @if(count($contacts))
<table class="table">
  <thead>
  <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Middlename</th>
    <th>Lastname</th>
    <th>Address</th>
    <th>Country</th>
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
    <td><a class="btn btn-outline-success" href="{{route('contacts.show',$contact->id)}}">View</a></td>
  </tr>
  @endforeach
  </tbody>
</table>

@endif
    </div>
  </div>
</div>
</body>
</html>
@stop

