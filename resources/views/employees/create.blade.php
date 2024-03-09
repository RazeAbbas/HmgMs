<div class="modal-content">
    <div class="modal-header text-white" style="background: #0984e3">
        <h5 class="modal-title" id="exampleModalLabel">
            {{$page_title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">
                ×
            </span>
        </button>
    </div>
    <form action="{{$action}}" method="post" data-action="make_ajax" data-action-after="reload" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Select Emloye Role</label>
                        <select class="form-control" name="roles">
                            @foreach (config('constants.roles') as $key=>$role)
                            @if (Auth::user()->roles == 1 && $role == 'Ceo')
                            <option value="{{$key}}">{{$role}}</option>
                            @endif
                            @if (Auth::user()->roles == 2 && $role == 'Office Manager')
                            <option value="{{$key}}">{{$role}}</option>
                            @endif
                            @if (Auth::user()->roles == 3)
                            <option value="{{ array_search('Supervisor',config('constants.roles')) }}">{{ config('constants.roles.5') }}</option>
                            <option value="{{ array_search('Office Assistant',config('constants.roles')) }}">{{ config('constants.roles.6') }}</option>
                            <option value="{{ array_search('Accountant',config('constants.roles')) }}">{{ config('constants.roles.4') }}</option>
                            <option value="{{ array_search('Office Staff',config('constants.roles')) }}">{{ config('constants.roles.9') }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @if (Auth::user()->roles == 1)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Select Company</label>
                        <select class="form-control" name="company">
                            @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                
                @if (Auth::user()->roles == 2)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Select Office</label>
                        <select class="form-control" name="office">
                            @foreach ($offices as $office)
                            <option value="{{$office->id}}">{{$office->office_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">First Name</label>
                        <input type='text' name="first_name" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Last Name</label>
                        <input type='text' name="last_name" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Email</label>
                        <input type='email' name="email" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Password</label>
                        <input type='password' name="password" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Number</label>
                        <input type='text' name="cnic" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone No</label>
                        <input type="text"  name="phone" id="phone" class="form-control"  />
                    </div>
                </div>  
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Pay</label>
                        <input type='text' name="pay" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">City</label>
                        <input type='text' name="city" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="label" class="control-label">Profile Image</label>
                        <input type='file' name="profile_image" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Front Image</label>
                        <input type='file' name="cnic_front" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Cnic Back Image</label>
                        <input type='file' name="cnic_back" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label" class="control-label">Police Verification</label>
                        <input type='file' name="police_verification" id="label" class="form-control" required="" value=""  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="control-label">Address</label>
                        <textarea  name="address" id="label" class="form-control" required="" value="" ></textarea>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn text-white" style="background: #0984e3">Add</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div> 