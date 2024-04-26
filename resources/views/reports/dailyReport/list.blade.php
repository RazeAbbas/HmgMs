@extends('layouts.app')
@section('content')
<div class="col-12">
    <div>
        <h3 class="text-center">{{$page_title}}</h3>
    </div>
    
    <div class="single-table">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-uppercase">
                    <tr>
                        <td colspan="3"><h6>Sales</h6></td>
                    </tr>
                    <tr class="text-white" style="background: #0984e3">
                        <th scope="col">Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Sale</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @if($sale_wmp)
                    @foreach($sale_wmp as $key=>$val)
                    <?php 
                    $total = $total + $val['total_bill']
                    ?>
                    <tr>
                        <td data-id="{{$val['id']}}" data-input="text" data-field=  "label">{{$val['date']}}</td>
                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                            {{$val->name}}
                        </td>
                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{$val['total_bill']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Total</strong> {{$total}}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="8" align="center">
                            <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong></h5>
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
                        <td colspan="3"><h6>Expense</h6></td>
                    </tr>
                    <tr class="text-white" style="background: #0984e3">
                        <th scope="col">Date</th>
                        <th scope="col">Expense Name</th>
                        <th scope="col">Expense Description</th>
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
                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['date']}}</td>
                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                             {{$val->getExpenseType->name}}
                        </td>
                        <td>{{$val['description']}}</td>
                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{$val['amount']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td><strong>Total</strong> {{$total_expense}}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="8" align="center">
                            <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong></h5>
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
                            <td colspan="3"><h6>Miscellaneous</h6></td>
                        </tr>
                        <tr class="text-white" style="background: #0984e3">
                            <th scope="col">Date</th>
                            <th scope="col">Details</th>
                            <th scope="col">Miscellaneous Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_miscellaneous = 0; ?>
                        @if($miscellaneous)
                        @foreach($miscellaneous as $key=>$val)
                        <?php 
                        $total_miscellaneous = $total_miscellaneous + $val['amount']
                        ?>
                        <tr>
                            <td>{{$val['date']}}</td>
                            <td>
                                <strong>Description</strong> {{$val['description']}}<br>
                            </td>
                            <td>Rs. {{$val['amount']}}</td>
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
                                <td colspan="3"><h6>Supplier Payment</h6></td>
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
                            <?php 
                            $total_supplier_payment = $total_supplier_payment + $val['paid_amount'];
                            ?>
                            <tr>
                                <td>{{$val['ledger_date']}}</td>
                                <td>
                                    <strong>Supplier Name</strong> {{$val['getSupplier']->name}}<br>
                                    <strong>Phone No.</strong> {{$val['getSupplier']->phone}}<br>
                                    <strong>Address</strong> {{$val['getSupplier']->address}}<br>
                                </td>
                                <td>Rs. {{$val['paid_amount']}}</td>
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
                
                <!-- <div class="single-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-uppercase">
                                <tr>
                                    <td colspan="3"><h6>Sub Dealer Payment</h6></td>
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
                                <?php 
                                $total_subdealer_payment = $total_subdealer_payment + $val['received_amount'];
                                ?>
                                <tr>
                                    <td>{{$val['date']}}</td>
                                    <td>
                                        <strong>Subdealer Name</strong> {{$val['getSubDealer']->name}}<br>
                                        <strong>Phone No.</strong> {{$val['getSubDealer']->phone}}<br>
                                        <strong>Address</strong> {{$val['getSubDealer']->address}}<br>
                                    </td>
                                    <td>Rs. {{$val['received_amount']}}</td>
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
                                <thead>
                                    <tr>
                                        <td colspan="3"><h6>Employee Payment</h6></td>
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
                                    {{-- {{dd($val['getEmployee']->toArray())}} --}}
                                    <?php 
                                    $total_payment = $total_payment + $val['amount'];
                                    ?>
                                    <tr>
                                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">{{$val['date']}}</td>
                                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">
                                            <strong>Employee Name</strong> {{$val['getEmployee']->first_name}} {{$val['getEmployee']->last_name}}<br>
                                            <strong>Phone No.</strong> {{$val['getEmployee']->phone}}<br>
                                            <strong>Address</strong> {{$val['getEmployee']->address}}<br>
                                        </td>
                                        <td data-id="{{$val['id']}}" data-input="text" data-field="label">Rs. {{$val['amount']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>Total</strong> {{$total_payment}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="1" align="center">
                                            <h5 style="text-align: center;"><strong>No {{$module['singular']}} found !</strong>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><strong>Total Incoming</strong> {{$total_subdealer_payment}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><strong>Total Outgoing</strong> {{$total_supplier_payment + $total_payment + $total_miscellaneous + $total_expense}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection