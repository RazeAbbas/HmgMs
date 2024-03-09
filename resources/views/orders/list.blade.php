@extends('layouts.app')
@section('content')

<div class="col">
  <div>
    <h4 class="text-center p-3">{{$page_title}}</h4>
  </div>
  
  <div>
    <a href="#data_modal" data-toggle="modal" data-url="{{url($module['action'].'/create')}}" data-action="data_modal" class="btn btn-danger" style="margin-bottom: 20px; float: right;">+ Add Area</a>
  </div>
  
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Date</th>
            <th scope="col">Customer</th>
            <th scope="col">Amount</th>
            <th scope="col">Desired Items</th>
            <th scope="col">Status</th>
            <th scope="col">Remarks</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>{{$val['date']}}</td>
              <td>{{$val['name']}}</td>
              <td>
                <strong>Total Bill</strong> {{$val['name']}}<br>
                <strong>Advance Amount</strong> {{$val['advance_amount']}}<br>
                <strong>Pending Amount</strong> {{$val['pending_amount']}}<br>
              </td>
              <td>{{App\Models\Order::find($val['id'])->getItem->name}}</td>
              <td>
                <strong>Amount In</strong> {{config('constants.amount_in.'.$val['amount_in'])}}<br>
                <strong>Amount Status</strong> {{config('constants.amount_status.'.$val['amount_status'])}}<br>
              </td>
              <td>{{$val['remarks']}}</td>
              <td>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More Actions
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item" >Delete</a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Edit </a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
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