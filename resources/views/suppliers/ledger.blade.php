@extends('layouts.app')
@section('content')

<div class="col">
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Payment Date</th>
            <th scope="col">Description</th>
            <th scope="col">Credit Amount</th>
            <th scope="col">Paid Amount</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          <?php 
          $total_bill = 0; 
          $total_advance_amount = 0;
          $balance = 0;
          ?>
          @foreach($list['data'] as $key=>$val)
          <?php 
          $total_bill = $total_bill + $val['amount'];
          $total_advance_amount = $total_advance_amount + $val['paid_amount'];
          $balance = $total_bill - $total_advance_amount;
          ?>
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>{{$val['ledger_date']}}</td>
              <td>
                <strong>Purchase</strong> {{$val['title']}}
              </td>
              <td>{{$val['amount']}}</td>
              <td>{{$val['paid_amount']}}</td>
            </tr>
            @endforeach
            <tr>
              <td colspan="3"></td>
              <td><strong>Total Purchase</strong></td>
              <td>{{$total_bill}}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td><strong>Total Paid</strong></td>
              <td>{{$total_advance_amount}}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td><strong>Balance</strong></td>
              <td>{{$balance}}</td>
            </tr>
            @else
            <tr>
              <td colspan="8" align="center">
                <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong> <a href="#data_modal" data-toggle="modal" data-url="{{url($module['action'].'/create')}}" data-action="data_modal">+Add New</a></h5>
                
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