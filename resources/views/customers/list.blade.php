@extends('layouts.app')
@section('content')
<div class="col">
  <div>
    <h2 class="text-center">{{$page_heading}}</h2>
  </div>
  <div class="col-md-12" >
    <a href="#data_modal" data-toggle="modal" data-url="{{url($module['action'].'/create')}}" data-action="data_modal" class="btn btn-danger text-white" style="margin-bottom: 20px; float: right;">+ Add Area</a>
  </div>
  
  <div class="single-table">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Name</th>
            <th scope="col">CNIC</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td>{{$val['name']}}</td>
              <td>{{$val['cnic']}}</td>
              <td>{{$val['phone']}}</td>
              <td>{{$val['address']}}</td>
              <td>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More Actions
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item">Delete</a>
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
      </div>
    </div>
    
    {{-- <table class="table table-bordered" id="editable" data-url="{{url($module['action'].'/edit')}}">
      <thead>
        <tr>
          <th scope="col"># ({{$count}})</th>
          <th scope="col">Name</th>
          <th scope="col">CNIC</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($list['data'])
        @foreach($list['data'] as $key=>$val)
        <tr>
          <td scope="row">{{$sindex++}}</th>
            <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['name']}}</td>
            <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['cnic']}}</td>
            <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['phone']}}</td>
            <td data-id="{{$val['id']}}" data-input="textarea" data-field="description">{{$val['address']}}</td>
            <td>
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a data-action="delete_record"  href="javascript:void(0);" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" class="dropdown-item">Delete</a>
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
      </table> --}}
      @include('paging')
    </div>
    
    @endsection