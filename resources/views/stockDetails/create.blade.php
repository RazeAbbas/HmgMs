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
                {{-- {{$stock}} --}}
                @for ($i=1; $i<=$stock->qty; $i++)
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="label" class="control-label">Barcode</label>
                            <input type='text' name="barcode[]" id="label" class="form-control" required=""/>
                            <input type='hidden' name="stock_id" id="label" class="form-control" required="" value="{{$stock->id}}"/>
                        </div>
                    </div>
                @endfor
                   
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn text-white" style="background: #0984e3">Add</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div> 