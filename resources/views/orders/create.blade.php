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
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload" >
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Customer Name</label>
                        <input type='text' name="name" id="label" class="form-control" required="" />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Phone Number</label>
                        <input type='text' name="phone" id="label" class="form-control" required="" />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Desired Item</label>
                        <select class="form-control" name="item">
                            @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Item Brand</label>
                        <select class="form-control" name="brand">
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Item Code</label>
                        <input type='text' name="item_code" id="label" class="form-control" required=""  />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Amount In</label>
                        <select class="form-control" name="amount_in">
                            @foreach (config('constants.amount_in') as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Amount Status</label>
                        <select class="form-control" name="amount_in">
                            @foreach (config('constants.amount_status') as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Total Bill</label>
                        <input type='text' name="total_bill" id="label" class="form-control" required="" />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Pending Amount</label>
                        <input type='text' name="pending_amount" id="label" class="form-control" required=""  />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Advance Amount</label>
                        <input type='text' name="advance_amount" id="label" class="form-control" required=""  />
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Transfer Account</label>
                        <select class="form-control" name="transfer_account">
                            @foreach ($accounts as $account)
                                <option value="{{$account->id}}">{{$account->holder_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Date</label>
                        <input type='text' name="date" id="label" class="form-control" required=""/>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Title</label>
                        <input type='text' name="title" id="label" class="form-control" required="" />
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description" class="control-label">remarks</label>
                        <textarea  name="remarks" id="description" class="form-control"></textarea>
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

