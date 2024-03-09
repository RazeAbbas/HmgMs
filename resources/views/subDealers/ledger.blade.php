@extends('layouts.app')
@section('content')

<div class="col">
  <div>
    <h4 class="text-center p-3">Sub Dealer Ledger</h4>
  </div>
  
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Sub Dealer</th>
            <th scope="col">Item</th>
            <th scope="col">Other Details</th>
            <th scope="col">Bill Amount</th>
            <th scope="col">Received Amount</th>
            <th scope="col">Remaining Amount</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>{{App\Models\Transaction::find($val['id'])->getSubDealer->name}}</td>
              <td>{{App\Models\Transaction::find($val['id'])->getItem->name}}</td>
              <td>
                <strong>Date</strong> {{$val['date']}}<br>
                <strong>Code</strong> {{$val['code']}}<br>
                <strong>Receipt Number</strong> {{$val['receipt_number']}}<br>
              </td>
              <td>{{$val['bill_amount']}}</td>
              <td>{{$val['received_amount']}}</td>
              <td>{{$val['bill_amount'] - $val['received_amount']}}</td>
              <td>{{$val['description']}}</td>
              <td>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More Actions
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url('dashboard/subDealers/transactions/delete/'.$val['id'])}}" class="dropdown-item" >Delete</a> 
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/subDealers/transactions/edit/'.$val['id'])}}" data-action="data_modal" class="dropdown-item"> Edit </a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="3"></td>
              <td><strong>Total</strong></td>
              <td><strong>{{$t_bill}}</strong></td>
              <td><strong>{{$r_bill}}</strong></td>
              <td><strong>{{$t_bill - $r_bill}}</strong></td>
            </tr>
            @else
            <tr>
              <td colspan="8" align="center">
                <h5 style="text-align: center;"><strong>No Ledger found !</strong> 
                  
                </td>
              </tr>
              @endif
              
            </tbody>
          </table>
          @include('paging')
        </div>
      </div>
    </div>
    @endsection