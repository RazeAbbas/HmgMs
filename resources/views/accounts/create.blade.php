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
                        <label for="label" class="control-label">Account Holder Name</label>
                        <input type='text' name="holder_name" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Account Title</label>
                        <input type='text' name="account_title" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Select Bank</label>
                        <select class="form-control" name="bank_id">
                            @foreach ($banks as $bank)
                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Account Number</label>
                        <input type='text' name="account_number" id="label" class="form-control" required="" value=""  />
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