<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        {{@$page_title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
            ×
        </span>
        </button>
    </div>
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Label</label>
                        <input type='text' name="label" id="label" class="form-control" required="" value="Test"  />
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea  name="description" id="description" class="form-control"  /></textarea>
                    </div>
                </div>  
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" >Add</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div> 