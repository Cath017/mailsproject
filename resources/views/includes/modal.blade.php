{{-- Modal for delivered/posted update --}}
<div class="modal fade" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3>{{__('messages.modal_head')}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST'>
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="delivered">{{__('messages.delivered')}}: </label>
              <input autocomplete="off" type="text" name="delivered" data-role="date" class="form-control date" >
          </div>
          <div class="form-group">
            <label for="posted">{{__('messages.posted')}}: </label>
              <input autocomplete="off" data-role="date" name="posted" type="text" class="form-control date"> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary pull-left" data-dismiss="modal">{{__('messages.close_btn')}}</button>
            <button type="submit" class="btn btn-outline-primary">{{__('messages.save_btn')}}</button>
          </div>
        </form>             
      </div>
    </div>
  </div>
</div>
  