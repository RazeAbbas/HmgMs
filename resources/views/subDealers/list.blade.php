@extends('layouts.app')
@section('content')

<div class="col">
  <div>
    <h4 class="text-center p-3">{{$page_title}}</h4>
  </div>
  <form action="{{ url('dashboard/subDealers/importSubdealers') }}" method="POST" data-action="make_ajax" data-action-after="reload" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
      <div class="form-group">
        <label for="subdealer">Select Excel FIle To Import</label>
        <input type="file" class="form-control" id="subdealer" name="add_subdealer" required> 
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
  </form>
  <div>
    <a href="{{ url('dashboard/subDealers/exportSubdealers') }}" class="btn btn-success ml-1" style="margin-bottom: 20px; float: right;">Export To Excel</a>
    <a href="#data_modal" data-toggle="modal" data-url="{{url($module['action'].'/create')}}" data-action="data_modal" class="btn btn-danger" style="margin-bottom: 20px; float: right;">+ Add Area</a>
  </div>
  
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Sub Dealer Name</th>
            <th scope="col">Sub Dealer Detail</th>
            <th scope="col">Bill Amount</th>
            <th scope="col">Received Amount</th>
            <th scope="col">Remaining Amount</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>{{$val['name']}}</td>
              <td>
                <strong>Phone</strong> {{$val['phone']}}<br>
                <strong>CNIC</strong> {{$val['cnic']}}<br>
                <strong>Address</strong> {{$val['address']}}<br>
              </td>
              <td>
                <?php 
                $b_amount = 0;
                $r_amount = 0;
                ?>
                @foreach ($val['get_transactions'] as $keys=>$value)
                @if (!empty($value['bill_amount']))
                <?php 
                $b_amount = $b_amount + $value['bill_amount'];  
                ?>
                @endif
                @endforeach
                {{$b_amount}}
              </td>
              <td>
                @foreach ($val['get_transactions'] as $keys=>$value)
                @if (!empty($value['received_amount']))
                <?php 
                $r_amount = $r_amount + $value['received_amount'];  
                ?>
                @endif
                @endforeach
                {{$r_amount}}
                
                <td>
                  {{-- {{(!empty($val['get_transactions']['bill_amount']) ? $val['get_transactions']['bill_amount'] : 0) - (!empty($val['get_transactions']['received_amount']) ? $val['get_transactions']['received_amount'] : 0)}} --}}
                  {{$b_amount - $r_amount}}
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item" >Delete</a>
                      <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Edit </a> 
                      <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/subDealers/transactions/create/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Make Transaction </a>
                      <a href="{{url('dashboard/subDealers/ledger/'.$val[$module['db_key']])}}" class="dropdown-item">View Ledger</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="3"></td>
                <td><strong>{{$total_bill_amount}}</strong></td>
                <td><strong>{{$total_received_amount}}</strong></td>
                <td><strong>{{$total_bill_amount - $total_received_amount}}</strong></td> 
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