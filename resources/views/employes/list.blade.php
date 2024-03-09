@extends('layouts.app')
@section('content')
<div class="col">
  <div>
    <div>
      <h2 class="text-center">Employees List</h2>
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
              <th scope="col">Profile Image</th>
              <th scope="col">Employee</th>
              <th scope="col">Office Details</th>
              <th scope="col">Contact Details</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if($list['data'])
            @foreach($list['data'] as $key=>$val)
            <tr>
              <td scope="row">{{$sindex++}}</th>
                <td data-id="{{$val['id']}}" data-input="text" data-field="description"><a href="{{asset('uploads/employes/'.$val['profile_image'])}}"><img src="{{asset('uploads/employes/'.$val['profile_image'])}}" height="100" width="100"/></a></td>
                <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                  <strong style="color: #0984e3">First Name</strong> {{$val['first_name']}}<br>
                  <strong style="color: #0984e3">Last Name</strong> {{$val['last_name']}}<br>
                  <strong style="color: #0984e3">CNIC</strong> {{$val['cnic']}}<br>
                </td>
                <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                  <strong style="color: #0984e3">Role</strong> {{ config('constants.roles.'.$val['roles'])}}<br>
                  <strong style="color: #0984e3">Salary</strong> {{$val['pay']}}<br>
                  <strong style="color: #0984e3">Rest Day</strong> {{ config('constants.weekDays.'.$val['rest'])}}<br>
                  <strong style="color: #0984e3">Office</strong> {{App\Models\Employe::find($val['id'])->getOffice->office_name}}<br>
                  <strong style="color: #0984e3">Company</strong> {{App\Models\Employe::find($val['id'])->getCompany->name}}
                </td>
                <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                  <strong style="color: #0984e3">Email</strong> {{$val['email']}}<br>
                  <strong style="color: #0984e3">Phone</strong> {{$val['phone']}}<br>
                  <strong style="color: #0984e3">City</strong> {{$val['city']}}<br>
                  <strong style="color: #0984e3">Address</strong> {{$val['address']}}<br>
                </td>
                <td>
                  {{--  --}}
                  <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item" >Delete</a>
                      <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Edit </a>
                      <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/employeePayments/create/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Add Payment </a> 
                      <a href="{{url('dashboard/employeePayments/list/'.$val[$module['db_key']])}}" class="dropdown-item"> View Payments </a>
                      <a href="{{url('dashboard/employes/employes-document/'.$val[$module['db_key']])}}" class="dropdown-item"> Employees Documents </a>
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
        </div>
      </div>
      {{-- <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Profile Image</th>
            <th scope="col">Employee</th>
            <th scope="col">Office Details</th>
            <th scope="col">Contact Details</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td data-id="{{$val['id']}}" data-input="text" data-field="description"><a href="{{asset('uploads/employes/'.$val['profile_image'])}}"><img src="{{asset('uploads/employes/'.$val['profile_image'])}}" height="100" width="100"/></a></td>
              <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                <strong>First Name</strong> {{$val['first_name']}}<br>
                <strong>Last Name</strong> {{$val['last_name']}}<br>
                <strong>CNIC</strong> {{$val['cnic']}}<br>
              </td>
              <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                <strong>Role</strong> {{ config('constants.roles.'.$val['roles'])}}<br>
                <strong>Salary</strong> {{$val['pay']}}<br>
                <strong>Rest Day</strong> {{ config('constants.weekDays.'.$val['rest'])}}<br>
                <strong>Office</strong> {{App\Models\Employe::find($val['id'])->getOffice->office_name}}<br>
                <strong>Company</strong> {{App\Models\Employe::find($val['id'])->getCompany->name}}
              </td>
              <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                <strong>Email</strong> {{$val['email']}}<br>
                <strong>Phone</strong> {{$val['phone']}}<br>
                <strong>City</strong> {{$val['city']}}<br>
                <strong>Address</strong> {{$val['address']}}<br>
              </td>
              <td>
                {{--  --}}
                {{-- <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More Actions
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item" >Delete</a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Edit </a>
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/employeePayments/create/'.$val[$module['db_key']])}}" data-action="data_modal" class="dropdown-item"> Add Payment </a> 
                    <a href="{{url('dashboard/employeePayments/list/'.$val[$module['db_key']])}}" class="dropdown-item"> View Payments </a>
                    <a href="{{url('dashboard/employes/employes-document/'.$val[$module['db_key']])}}" class="dropdown-item"> Employees Documents </a> --}}
                    {{-- <a href="{{url('dashboard/employes/detail/'.$val[$module['db_key']])}}" class="dropdown-item"> View Details </a> --}}
                    {{-- </div>
                    </div> --}}
                    {{--  --}}
                    {{-- <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" >Delete</a> | 
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal"> Edit </a> |
                    <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/employeePayments/create/'.$val[$module['db_key']])}}" data-action="data_modal"> Add Payment </a> | 
                    <a href="{{url('dashboard/employeePayments/list/'.$val[$module['db_key']])}}"> View Payments </a> | 
                    <a href="{{url('dashboard/employes/employes-document/'.$val[$module['db_key']])}}"> Employees Documents </a>
                    <a href="{{url('dashboard/employes/detail/'.$val[$module['db_key']])}}"> View Details </a> --}}
                    {{-- </td>
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
                </table> --}}
                @include('paging') 
              </div>
            </div>
            @endsection