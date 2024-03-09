@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row" style="margin-bottom: 20px;">
        <div class="" >
          
          {{-- {{dd($breadcrumbs['#'])}} --}}
        </div>

        <div class="col-md-12">
            <div>
                <h4 class="bg-info p-3 text-light text-center">{{$page_heading}}</h4>
            </div>
            <table class="table table-bordered">
               <tbody>
                @if($employee)
                <tr>
                    <td colspan="3">
                        <strong>Profile Image</strong>
                    </td>
                    <td><a href="{{asset('uploads/employes/'.$employee['profile_image'])}}"><img src="{{asset('uploads/employes/'.$employee['profile_image'])}}" height="150" width="150"/></a></td>
                </tr>
                <tr>
                    <td>
                        <strong>First Name</strong>
                    </td>
                    <td>{{$employee['first_name']}}</td>
                    <td>
                        <strong>Last Name</strong>
                    </td>
                    <td> {{$employee['last_name']}}</td>
                </tr>

                <tr>
                    <td>
                        <strong>CNIC</strong>
                    </td>
                    <td>{{$employee['cnic']}}</td>
                    <td>
                        <strong>rest Day</strong>
                    </td>
                    <td>{{ config('constants.weekDays.'.$employee['rest'])}}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Role</strong>
                    </td>
                    <td>{{ config('constants.roles.'.$employee['roles'])}}</td>
                    <td>
                        <strong>Salary</strong>
                    </td>
                    <td>{{ $employee['pay']}}</td>
                </tr>

                <tr>
                    <td>
                        <strong>Office</strong>
                    </td>
                    <td>{{App\Models\Employe::find($employee->id)->getOffice->office_name}}</td>
                    <td>
                        <strong>Company</strong>
                    </td>
                    <td>{{App\Models\Employe::find($employee->id)->getCompany->name}}</td>
                </tr>

                <tr>
                    <td>
                        <strong>Email</strong>
                    </td>
                    <td>{{$employee['email']}}</td>
                    <td>
                        <strong>Phone</strong>
                    </td>
                    <td>{{$employee['phone']}}</td>
                </tr>

                <tr>
                    <td>
                        <strong>City</strong>
                    </td>
                    <td>{{$employee['city']}}</td>
                    <td>
                        <strong>Address</strong>
                    </td>
                    <td>{{$employee['address']}}</td>
                </tr>
                <tr>
                    <td>
                        <strong>CNIC Front Image</strong>
                    </td>
                    <td><a href="{{asset('uploads/employes/'.$employee['cnic_front'])}}"><img src="{{asset('uploads/employes/'.$employee['cnic_front'])}}" height="150" width="150"/></a></td>

                    <td>
                        <strong>CNIC Back Image</strong>
                    </td>
                    <td><a href="{{asset('uploads/employes/'.$employee['cnic_back'])}}"><img src="{{asset('uploads/employes/'.$employee['cnic_back'])}}" height="150" width="150"/></a></td>
                </tr>
                <tr>
                    <td>
                        <strong>Police Verification</strong>
                    </td>
                    <td><a href="{{asset('uploads/employes/'.$employee['police_verification'])}}"><img src="{{asset('uploads/employes/'.$employee['police_verification'])}}" height="150" width="150"/></a></td>
                </tr>
                @else
                    <tr>
                    <td colspan="8" align="center">
                        <h5 style="text-align: center;"><strong>No Employee Detail found !</strong> <a href="#data_modal" data-toggle="modal" data-url="{{url($module['action'].'/create')}}" data-action="data_modal">+Add New</a></h5>

                    </td>
                    </tr>
                @endif
               </tbody>
            </table>
           {{-- <table class="table table-bordered" id="editable" data-url="{{url($module['action'].'/edit')}}">
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
                   <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" >Delete</a> | 
                   <a href="#data_modal" data-toggle="modal"  data-url="{{url($module['action'].'/edit/'.$val[$module['db_key']])}}" data-action="data_modal"> Edit </a> |
                   <a href="#data_modal" data-toggle="modal"  data-url="{{url('dashboard/employeePayments/create/'.$val[$module['db_key']])}}" data-action="data_modal"> Add Payment </a> | 
                   <a href="{{url('dashboard/employeePayments/list/'.$val[$module['db_key']])}}"> View Payments </a> | 
                   <a href="{{url('dashboard/employes/employes-document/'.$val[$module['db_key']])}}"> Employees Documents </a>
                   <a href="{{url('dashboard/employes/detail/'.$val[$module['db_key']])}}"> View Details </a>
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
           </table> --}}
           @include('paging')
        </div>
     </div>
</div>

@endsection