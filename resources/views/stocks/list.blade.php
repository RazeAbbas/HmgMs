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
  <div class="row" style="margin-bottom: 20px;">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead class="text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Items/Brands</th>
            <th scope="col">Purchase Price</th>
            <th scope="col">Qty</th>
            <th scope="col">Total Price</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          <?php $total = 0 ?>
          @foreach($list['data'] as $key=>$val)
          
          <?php  
          $total = $total + ($val['qty'] * $val['per_price']);
          ?>
          <tr>
            {{-- <td><input type="checkbox" name="user[]" value="19"></th> --}}
              <td scope="row">{{$sindex++}}</th>
                <td>
                  <strong>Item</strong> {{App\Models\Stock::find($val['id'])->getItems->name}}<br>
                  <strong>Brand</strong> {{App\Models\Stock::find($val['id'])->getBrands->name}}<br>
                  <strong>Title</strong> {{$val['title']}}<br>
                </td>
                <td>
                  {{$val['per_price']}}
                </td>
                <td>
                  {{$val['qty']}}
                </td>
                <td>
                  {{$val['qty'] * $val['per_price']}}
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Total Bill</strong>
                </td>
                <td>
                  <strong>{{$total}}</strong>
                </td>
              </tr>
              @else
              <tr>
                <td colspan="8" align="center">
                  <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong> </h5>
                  
                </td>
              </tr>
              @endif
              
            </tbody>
          </table>
          {{-- @include('paging') --}}
        </div>
      </div>
    </div> 