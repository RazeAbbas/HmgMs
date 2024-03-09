{{-- <div class="modal-content">
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
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Item</label>
                        <select class="form-control" name="item">
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Brand</label>
                        <select class="form-control" name="brand">
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Storage Area</label>
                        <select class="form-control" name="storage_area">
                            @foreach ($storage as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Title</label>
                        <input type='title' name="title" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Quantity</label>
                        <input type='text' name="qty" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Per Price</label>
                        <input type='text' name="per_price" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Date</label>
                        <input type='date' name="date" id="label" class="form-control" required=""/>
                    </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Battery</label>
                        <input type='text' name="battery" id="label" class="form-control" required=""/>
                    </div>
                </div>
                <div class="col-md-4">
                        <input type='hidden' name="purchase_id" id="label" class="form-control" value="{{$purchase->id}}"/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" >Add</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>  --}}


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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Item</label>
                        <select class="form-control" name="item">
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Brand</label>
                        <select class="form-control" name="brand">
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Storage Area</label>
                        <select class="form-control" name="storage_area">
                            @foreach ($storage as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Title</label>
                        <input type='title' name="title" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Quantity</label>
                        <input type='text' name="qty" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Per Price</label>
                        <input type='text' name="per_price" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Date</label>
                        <input type='date' name="date" id="label" class="form-control" required=""/>
                    </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Dashboard Status</label>
                        <select class="form-control" name="status">
                            @foreach (config('constants.booleans') as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Battery</label>
                        <input type='text' name="battery" id="label" class="form-control" required=""/>
                    </div>
                </div>

                <div class="col-md-4">
                    <input type='hidden' name="purchase_id" id="label" class="form-control" value="{{$purchase->id}}"/>
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