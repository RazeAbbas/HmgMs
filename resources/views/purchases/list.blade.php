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
            <th scope="col">Image</th>
            <th scope="col">Purchases</th>
            <th scope="col">Details</th>
            <th scope="col">Ledger</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td data-id="{{$val['id']}}" data-input="textarea" data-field="description">
                <a href="{{asset('uploads/purchases/'.$val['purchase_receipt_image'])}}"><img src="{{asset('uploads/purchases/'.$val['purchase_receipt_image'])}}" height="150" width="150"/></a>
              </td>
              <td data-id="{{$val['id']}}" data-input="text" data-field="label">
              <strong class="text-info">Name</strong> {{ optional(App\Models\Purchase::find($val['id'])->getSupplier)->name }}<br>

                <strong class="text-info">Title</strong> {{$val['title']}}<br>
                <strong class="text-info">Order Date</strong> {{$val['order_date']}}<br>
                <strong class="text-info">Receive Date</strong> {{$val['receive_date']}}<br>
                <strong class="text-info">Status</strong> {{config('constants.orderStatus.'.$val['status'])}}<br>
              </td>
              <td data-id="{{$val['id']}}" data-input="textarea" data-field="description">
                <strong class="text-info">Total Bill</strong> {{$val['total_bill']}}<br>
                <strong class="text-info">Advance Payment</strong> {{$val['advance_payment']}}<br>
                <strong class="text-info">Cargo Service</strong> {{$val['cargo_service']}}<br>
                <strong class="text-info">Bilter Number</strong> {{$val['bilter_number']}}<br>
                <strong class="text-info">Cargo Service Number</strong> {{$val['cargo_service_number']}}<br>
                <strong class="text-info">Description</strong> {{$val['description']}}
              </td>
              <td>
                <a href="{{ url('dashboard/suppliers/ledger/'.$val['supplier']) }}">View Ledger</a>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More Actions
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item" >Delete</a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Edit </a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/stocks/create/'.$val['id'])}}" data-action="data_modal" class="dropdown-item"> Add Stock </a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/stocks/'.$val['id'])}}" data-action="data_modal" class="dropdown-item"> View Receipt </a>
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
  
  {{-- <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/quickPayments/create/'.$val['supplier'])}}" data-action="data_modal"> Quick Payment </a> --}}