<div class="modal-content">
    <div class="modal-header text-white" style="background: #0984e3s">
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Title</label>
                        <input type='text' name="title" id="label" class="form-control" required="" />
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">File in PDF</label>
                        <input type='file' name="file" id="label" class="form-control" required="" />
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