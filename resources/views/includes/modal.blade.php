
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h3>Change Dates</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method='POST'>
            @csrf
            @method('PATCH')
                <div class="form-group">
                  <label for="delivered">Delivered List: </label>
                    <input autocomplete="off" type="text" name="delivered" data-role="date" class="form-control date" >
                </div>
                <div class="form-group">
                  <label for="posted">Posted List: </label>
                    <input autocomplete="off" data-role="date" name="posted" type="text" class="form-control date"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </form>             
        </div>
      </div>
    </div>
  </div>
  