<div class="modal-content">
    <div class="modal-header text-light" style="background:#0984e3">
        <h5 class="modal-title" id="exampleModalLabel">
        {{@$page_title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-light">
            ×
        </span>
        </button>
    </div>
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Select Emloye Role</label>
                        <select class="form-control" name="roles">
                            @foreach (config('constants.roles') as $key=>$role)
                                @if ($key > 3)
                                    <option value="{{$key}}" {{$key == $row->roles ? 'selected':''}}>{{$role}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">First Name</label>
                        <input type='text' name="first_name" id="label" class="form-control" required="" value="{{$row->first_name}}"  />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Last Name</label>
                        <input type='text' name="last_name" id="label" class="form-control" required="" value="{{$row->last_name}}"  />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Email</label>
                        <input type='email' name="email" id="label" class="form-control" required="" value="{{$row->email}}"  />
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Password</label>
                        <input type='password' name="password" id="label" class="form-control" required="" value=""  />
                    </div>
                </div> --}}

                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">City</label>
                        <input type='text' name="city" id="label" class="form-control" required="" value="{{$row->city}}"  />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Number</label>
                        <input type='text' name="cnic" id="label" class="form-control" required="" value="{{$row->cnic}}"  />
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone No</label>
                        <input type="text"  name="phone" id="phone" class="form-control" value="{{$row->phone}}"/>
                    </div>
                </div>  


            <div class="col-md-4">
                <div class="form-group">
                    <label for="label" class="control-label">Pay</label>
                    <input type='text' name="pay" id="label" class="form-control" required="" value="{{$row->pay}}"  />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="label" class="control-label">Rest Day</label>
                    <select class="form-control" name="rest">
                        @foreach (config('constants.weekDays') as $key=>$day)
                        <option value="{{$key}}" {{$row->rest == $key ? 'selected':''}}>{{$day}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Profile Image</label>
                        <input type='file' name="profile_image" id="label" class="form-control" value=""  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Front Image</label>
                        <input type='file' name="cnic_front" id="label" class="form-control" value=""  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Back Image</label>
                        <input type='file' name="cnic_back" id="label" class="form-control" value=""  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Police Verification</label>
                        <input type='file' name="police_verification" id="label" class="form-control" value=""  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Address</label>
                        <textarea  name="address" id="label" class="form-control" required="" value="" >{{$row->address}}</textarea>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger m-btn m-btn--icon" id="add_oh_period"><span><i class="la la-check"></i><span>Update</span></span></button>
            <button type="button" class="btn btn-secondary m-btn m-btn--icon" data-dismiss="modal"><span>Close</span></button>
        </div>
    </form>
</div> 