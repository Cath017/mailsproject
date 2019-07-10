@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
      
    </div>
  </div>
</div>

<script src="http://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function(){
        $('.date').each(function(){
            $(this).datepicker();
        });
    });
</script>
@stop
