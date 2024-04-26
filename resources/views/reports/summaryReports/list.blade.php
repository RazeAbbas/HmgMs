@extends('layouts.app')
@section('content')

<div class="col">
  <div>
    <h3 class="p-3 text-center">{{$page_title}}</h3>
  </div>
  
  <div class="single-table">
    <div class="table-responsive">
      <table class="table">
        <thead class="text-uppercase text-white" style="background: #0984e3">
          <tr>
            <th scope="col"><h5>Summary</h5></th>
            <th scope="col"><h5>Payments</h5></th>
          </tr>
        </thead>
        <tbody>
          
          {{-- <th scope="row"><strong>Bill Payment</strong></th>
          <td data-id="" data-input="text" data-field="label">Rs. {{$bill_payment}}</td> --}}
          
          <tr>
            <td scope="row"><strong>Expense</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$expense}}</td>
            </tr>
            
            <tr>
              <th scope="row"><strong>Miscellaneous</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$miscellaneous}}</td>
            </tr>
            
            <tr>
              <th scope="row"><strong>Supplier Payment</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$supplier_payment}}</td>
            </tr>
            
            <tr>
              <th scope="row"><strong>Employee Payment</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$employee_payment}}</td>
            </tr>
            <tr>
              <th scope="row"><strong>Sales</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$sales}}</td>
            </tr>
            <!-- <tr>
              <th scope="row"><strong>Sub Dealer Payment</strong></th>
              <td data-id="" data-input="text" data-field="label">Rs. {{$subdealer_payment}}</td>
            </tr> -->
            
            <tr>
              <td colspan="1"></td>
              <td><strong>Credit:</strong> {{$sales + $subdealer_payment}}</td>
            </tr>
            
            <tr>
              <td colspan="1"></td>
              <td><strong>Debit:</strong> {{$miscellaneous + $supplier_payment + $expense + $employee_payment}}</td>
            </tr>
            
            <tr>
              <td colspan="1"></td>
              <td><strong>Cash:</strong> {{($sales + $subdealer_payment) - ($miscellaneous + $supplier_payment + $expense + $employee_payment)}}</td>
            </tr>
          </tbody>
        </table>
        @include('paging')
      </div>
    </div>
  </div>
  
  @endsection