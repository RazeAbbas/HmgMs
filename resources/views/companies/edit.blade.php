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
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Name</label>
                        <input type='text' name="name" id="label" class="form-control" required="" value="{{$row->name}}"  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <input type="text"  name="phone" id="phone" class="form-control" value="{{$row->phone}}"/>
                    </div>
                </div>  
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">City</label>
                        <input type='text' name="city" id="label" class="form-control" required="" value="{{$row->city}}"  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state" class="control-label">State</label>
                        <input type="state"  name="state" id="state" class="form-control" value="{{$row->state}}" />
                    </div>
                </div>  
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Address</label>
                        <textarea  name="address" id="label" class="form-control" required="">{{$row->address}}</textarea>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger m-btn m-btn--icon" id="add_oh_period"><span><i class="la la-check"></i><span>Update</span></span></button>
            <button type="button" class="btn btn-secondary m-btn m-btn--icon" data-dismiss="modal"><span>Close</span></button>
        </div>
    </form>
</div> 