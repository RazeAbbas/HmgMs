<div class="modal-content">
    <div class="modal-header text-white" style="background: #0984e3">
        <h5 class="modal-title" id="exampleModalLabel">
        {{@$page_title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-white">
            ×
        </span>
        </button>
    </div>
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Date</label>
                        <input type='date' name="date" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Amount</label>
                        <input type='text' name="amount" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Image</label>
                        <input type='file' name="image" id="label" class="form-control"/>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea  name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>  
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn text-white" style="background: #0984e3">Add</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div> 