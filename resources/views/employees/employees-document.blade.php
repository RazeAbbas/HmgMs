@extends('layouts.app')
@section('content')

<div class="col">
    <div>
        <h4 class="p-3 text-center">Employee Documents</h4>
    </div>
    
    <div class="single-table">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-uppercase text-white" style="background: #0984e3">
                    <tr>
                        <th scope="col">Cnic Front Image</th>
                        <th scope="col">Cnic Back Image</th>
                        <th scope="col">Police Verification</th>
                    </tr>
                </thead>
                <tbody>
                    @if($record)
                    <tr>
                        <td><a href="{{asset('uploads/images/'.$record['cnic_front'])}}"><img src="{{asset('uploads/images/'.$record['cnic_front'])}}" height="200" width="200"/></a></td>
                        <td><a href="{{asset('uploads/images/'.$record['cnic_back'])}}"><img src="{{asset('uploads/images/'.$record['cnic_back'])}}" height="200" width="200"/></a></td>
                        <td><a href="{{asset('uploads/images/'.$record['police_verification'])}}"><img src="{{asset('uploads/images/'.$record['police_verification'])}}" height="200" width="200"/></a></td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="8" align="center">
                            <h5 style="text-align: center;"><strong>No Document found !</strong> 
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