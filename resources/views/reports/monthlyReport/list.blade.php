@extends('layouts.app')
@section('content')
<div class="col">
    <div>
        <h3 class="p-3 text-center">{{$page_title}}</h3>
    </div>
    <form action="{{url("dashboard/reports/monthlyReport/")}}" method="GET">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputStart">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="exampleInputStart" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEnd">End Date</label>
                <input type="date" class="form-control" name="end_date" id="exampleInputEnd" required>
            </div>
            <button type="submit" class="btn btn-danger mb-3">Submit</button>
        </div>
    </form>
    <div class="single-table">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-uppercase">
                    <tr>
                        <td><h6>Expense Report</h6></td>
                    </tr>
                    <tr class="text-white" style="background: #0984e3">
                        <th scope="col">Date</th>
                        <th scope="col">Details</th>
                        <th scope="col">Expense</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_expense = 0; ?>
                    @if($expense)
                    @foreach($expense as $key=>$val)
                    <?php 
                    $total_expense = $total_expense + $val['amount']
                    ?>
                    <tr>
                        <td>{{$val['date']}}</td>
                        <td>
                            <strong>Expense</strong> {{App\Models\Expense::find($val['id'])->getExpenseType->name}}<br>
                            <strong>Description</strong> {{$val['description']}}<br>
                        </td>
                        <td>Rs. {{$val['amount']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Total</strong> {{$total_expense}}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="8" align="center">
                            <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="single-table">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-uppercase">
                        <tr>
                            <td><h6>Miscellaneous Report</h6></td>
                        </tr>
                        <tr class="text-white" style="background: #0984e3">
                            <th scope="col">Date</th>
                            <th scope="col">Details</th>
                            <th scope="col">Miscellaneous Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_miscellaneous = 0; ?>
                        @if($expense)
                        @foreach($miscellaneous as $key=>$val)
                        <?php 
                        $total_miscellaneous = $total_miscellaneous + $val['amount']
                        ?>
                        <tr>
                            <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['date']}}</td>
                            <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                                <strong>Description</strong> {{$val['description']}}<br>
                            </td>
                            <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{$val['amount']}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Total</strong> {{$total_miscellaneous}}</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="8" align="center">
                                <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <td><h6>Supplier Payment</h6></td>
                            </tr>
                            <tr class="text-white" style="background: #0984e3">
                                <th scope="col">Date</th>
                                <th scope="col">Details</th>
                                <th scope="col">Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_supplier_payment = 0; ?>
                            @if($employee_payment)
                            @foreach($supplier_payment as $key=>$val)
                            {{-- {{dd($val['getEmployee']->toArray())}} --}}
                            <?php 
                            $total_supplier_payment = $total_supplier_payment + $val['paid_amount'];
                            ?>
                            <tr>
                                <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['ledger_date']}}</td>
                                <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                                    <strong>Supplier Name</strong> {{@$val['getSupplier']->name}}<br>
                                    <strong>Phone No.</strong> {{@$val['getSupplier']->phone}}<br>
                                    <strong>Address</strong> {{@$val['getSupplier']->address}}<br>
                                </td>
                                <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{@$val['paid_amount']}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td><strong>Total</strong> {{$total_supplier_payment}}</td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="8" align="center">
                                    <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
<!--                 
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-uppercase">
                                <tr>
                                    <td><h6>Sub Dealer Payment</h6></td>
                                </tr>
                                <tr class="text-white" style="background: #0984e3">
                                    <th scope="col">Date</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Received Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_subdealer_payment = 0; ?>
                                @if($subdealer_payment)
                                @foreach($subdealer_payment as $key=>$val)
                                {{-- {{dd($val['getEmployee']->toArray())}} --}}
                                <?php 
                                $total_subdealer_payment = $total_subdealer_payment + $val['received_amount'];
                                ?>
                                <tr>
                                    <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['date']}}</td>
                                    <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                                        <strong>Subdealer Name</strong> {{$val['getSubDealer']->name}}<br>
                                        <strong>Phone No.</strong> {{$val['getSubDealer']->phone}}<br>
                                        <strong>Address</strong> {{$val['getSubDealer']->address}}<br>
                                    </td>
                                    <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{$val['received_amount']}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"></td>
                                    <td><strong>Total</strong> {{$total_subdealer_payment}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="8" align="center">
                                        <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-uppercase">
                                    <tr>
                                        <td><h6>Employee Payment</h6></td>
                                    </tr>
                                    <tr class="text-white" style="background: #0984e3">
                                        <th scope="col">Date</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_payment = 0; ?>
                                    @if($employee_payment)
                                    @foreach($employee_payment as $key=>$val)
                                    @php 
                                    $total_payment = $total_payment + $val['amount'];
                                    @endphp
                                    <tr>
                                        <td>{{$val['date']}}</td>
                                        <td>
                                            <strong>Employee Name</strong> {{@$val['getEmployee']['first_name']}} {{@$val['getEmployee']['last_name']}}<br>
                                            <strong>Phone No.</strong> {{@$val['getEmployee']['phone']}}<br>
                                            <strong>Address</strong> {{@$val['getEmployee']['address']}}<br>
                                        </td>
                                        <td>Rs. {{$val['amount']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>Total</strong> {{$total_payment}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="8" align="center">
                                            <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection