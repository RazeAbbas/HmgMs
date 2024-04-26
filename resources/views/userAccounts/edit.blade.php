@extends('layouts.app')
@section('content')

<div class="col">
    <div>
        <h3 class="text-center p-3">{{@$page_title}}</h3>
    </div>
    <div class="col-md-8">
        {{-- action="{{$action}}" method="POST" data-action="make_ajax" data-action-after="reload" --}}
        <form action="{{url('dashboard/userAccounts/edit/'.$row->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" required value="{{$row->first_name}}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" required value="{{$row->last_name}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label><br>
                <img src="{{ asset('uploads/images/'.$row->profile_image)}}" height="150" width="150"/>
                <input type="file" name="profile_image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" disabled value="{{config('constants.roles.'.$row->roles)}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address" required>{{$row->address}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 text-center">
            <h3>{{@$page_title}}</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="{{$action}}" method="POST" data-action="make_ajax" data-action-after="reload" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required value="{{$row->first_name}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required value="{{$row->last_name}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <img src="{{ asset('uploads/images/'.$row->profile_image)}}" height="150" width="150"/>
                    <input type="file" name="profile_image" class="form-control" id="image">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="roles" class="form-control" id="role" disabled value="{{config('constants.roles.'.$row->roles)}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address" required>{{$row->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> --}}
@endsection

