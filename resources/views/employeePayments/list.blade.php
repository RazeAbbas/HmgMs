@extends('layouts.app')
@section('content')

<div class="col">
  <div>
    <h4 class="text-center p-3">Employee Payment List</h4>
  </div>
  <div class="col-6 p-3">
    <form action="{{ url('dashboard/employeePayments/list/'.@$list['data'][0]['employee_id']) }}" method="GET">
      <label for="label" class="control-label"><strong>Start Date</strong></label>
      <input type="date" name="start_date" class="form-control mb-2" required>
      <label for="label" class="control-label"><strong>End Date</strong></label>
      <input type="date" name="end_date" class="form-control mb-2">
      <input type="submit" class="btn btn-danger" value="Filter">
    </form>
  </div>
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Details</th>
            <th scope="col">Amount</th>
            <th scope="col">Employee</th>
            <th scope="col">Note</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>
                <strong>Year</strong> {{$val['year']}}<br>
                <strong>Month</strong> {{config('constants.months.'.$val['month'])}}<br>
                <strong>Date</strong> {{$val['date']}}<br>
              </td>
              <td>{{$val['amount']}}</td>
              <td>{{App\Models\EmployeePayment::find($val['id'])->getEmployee->first_name}}</td>
              <td>{{$val['note']}}</td>
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
                {{-- <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" >Delete</a> | <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal"> Edit </a> --}}
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="8" align="center">
                <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                  
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