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
                        <label for="label" class="control-label">Supplier</label>
                        <select class="form-control" name="supplier">
                            @foreach ($supplier as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Title</label>
                        <input type='text' name="title" id="label" class="form-control" required=""/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Order Date</label>
                        <input type='date' name="order_date" id="label" class="form-control" required=""/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Receive Date</label>
                        <input type='date' name="receive_date" id="label" class="form-control" required=""/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Status</label>
                        <select class="form-control" name="status">
                           @foreach (config('constants.orderStatus') as $key=>$status)
                               <option value="{{$key}}">{{$status}}</option>
                           @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Total Bill</label>
                        <input type="text" name="total_bill" data-mask="price" data-prefix="$" id="label" class="form-control" required=""/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Advance Payment</label>
                        <input type='text' name="advance_payment" id="label" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Purchase Receipt</label>
                        <input type="file" name="purchase_receipt_image" id="label" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Cargo Service</label>
                        <input type='text' name="cargo_service" id="label" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="label" class="control-label">Bilter Number</label>
                        <input type='text' name="bilter_number" id="label" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="label" class="control-label">Cargo Service Number</label>
                        <input type='text' name="cargo_service_number" id="label" class="form-control"/>
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