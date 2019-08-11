@extends('layouts.app')
@section('content')
@include('includes.modal')

<div class="row mt-5">
  <div class="col-md-6">
    {{-- Card with contact informations, update and delete buttons --}}
    <div class="card">
      <div class="card-header">{{__('messages.address')}}</div>
      <div class="card-body">
        <div class="row">
          {{-- Contact info --}}
          <div class="col-sm-6">
            @if($contact->middle_name)
              <p>{{"{$contact->first_name} {$contact->middle_name} {$contact->last_name}" }}</p>
            @else
              <p>{{"{$contact->first_name} {$contact->last_name}" }}</p>
            @endif
              <p>{{$contact->address}}</p>
              <p>{{$contact->state}}</p>
          </div>
          {{-- Buttons --}}
          <div class="col-sm-6">
            @if(!Auth::guest())
            <div class="form-group">  
              <a class="btn btn-outline-primary" href="{{route('contacts.edit',$contact->id)}}">{{__('messages.update_btn')}}</a>
            </div>
            <div class="form-group">
              <form class="delete" action="{{action('ContactsController@destroy', $contact->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="{{__('messages.delete_btn')}}" class="btn btn-outline-danger">
              </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    {{-- Delivered/Posted Table --}}
    <table class="table">
      <thead>
        <tr>
          <th>{{__('messages.delivered')}}</th>
          <th>{{__('messages.posted')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contact->mails as $mail)
          <tr>
            <td class="delivered">{{$mail->delivered->format('d.m.Y')}}</td>
            <td class="posted">{{isset($mail->posted) ? $mail->posted->format('d.m.Y') : ''}}</td>
            {{-- Update / Delete Mail Buttons --}}
            <td>
              <form class="delete" action="{{action('MailsController@destroy', $mail->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="{{__('messages.delete_btn')}}" class="btn btn-outline-danger">
              </form>
            </td>
            <td>
              <a class="update {{$mail->id }}" data-toggle="modal" data-target="#edit-modal" href="#"><i class="fa fa-pencil-square-o fa-3x" style="color:black" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    {{-- Messages --}}
    @if($flash = session('message'))
      <div id="flash-message" class="alert alert-success">
        {{$flash}}
      </div>
    @endif
    {{-- Form for adding mails --}}
    <form action="/contacts/{{$contact->id}}/mails" method="POST">
      @csrf
      <div class="form-group">
        <label for="delivered">{{__('messages.delivered')}}: </label>
        <input autocomplete="off" type="text" name="delivered" data-role="date" class="form-control date">
      </div>
      <div class="form-group">
        <label for="posted">{{__('messages.posted')}}: </label>
          <input autocomplete="off" data-role="date" name="posted" type="text" class="form-control date">
      </div>
      <div class="form-group">
        <input type="submit" value="{{__('messages.add_btn')}}" class="form-control btn btn-outline-success">
      </div>
    </form> 
  </div>
</div>
</div>
@stop

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(document).ready(function(){

    // Datepicker
    $(function(){
      $('.date').each(function(){
          $(this).datepicker({ dateFormat: 'dd.mm.yy' });
      });
    });

    // Confirmation delete
    $(".delete").on("submit", function(){
      return confirm("{{__('messages.confirm')}}");
    });

    // Flash msg fade
    $('#flash-message').delay(2000).fadeOut(2000);
    

    // Update mails button
    $('.update').on('click', function(e){
      const id = $(e.target).parent().attr('class').split(' ')[1];
      const delivered = $(e.target).parents('tr').find('td.delivered').text();
      const posted = $(e.target).parents('tr').find('td.posted').text();

      $('.modal form').attr('action', `http://mail.test/contacts/${id}/mails`);
      $('.modal input[name=delivered]').val(delivered);
      $('.modal input[name=posted]').val(posted);
    })
  });
  
</script>
@endsection

