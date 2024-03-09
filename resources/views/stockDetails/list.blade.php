@extends('layouts.app')
@section('content')
<div class="col">
  <div>
    <h4 class="text-center p-3">{{$page_title}}</h4>
  </div>
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"># ({{$count}})</th>
            <th scope="col">Barcode</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($list['data'])
          @foreach($list['data'] as $key=>$val)
          <tr>
            <td scope="row">{{$sindex++}}</th>
              <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['barcode']}}</td>
              {{-- <td data-id="{{$val['cat_id']}}" data-input="textarea" data-field="description">{{$val['description']}}</td> --}}
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