@extends('layouts.app')
@section('styles')
<style>
    .todo .hoverable:not(:hover) + .show-on-hover {
        display: none;
    }
    .todo .show-on-hover { position:fixed; background:#ffff8d; padding:9px;z-index:9999; width:480px;box-shadow: 10px 10px 5px grey;}
    .todo dl {margin-left:16px;border:1px solid white;}
    .todo dt {margin-top:9px;}
    .todo dd {margin-left:24px;}
    /**** The above is not part of the pen *****/
    
    .pos-container .item {
        width:8em; 
        height:6em; border-radius: 5px;margin:8px 8px;float:left;
        background-color:#abcc80;
        color: white
        /*  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0; */
        box-shadow: 10px 10px 5px grey;
        overflow:hidden;
    }
    /* .pos-container .item:hover {background-color:#9933CC;box-shadow: 2px 2px 1px black;} */
    .pos-container .item img {
        position:relative;
        float:left;
    }
    .pos-container .item .title {float:left;}
    
    .pos-container .navlist {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 0;
    }
    .select.form-control:not([size]):not([multiple]) {
        height: calc(3.25rem + 2px) !important; 
    }
    .pos-container .navlist { bacground-color:#ddd; }
    .pos-container .tabbar { margin-top:3px; }
    
    .pos-container .panel-invoice {min-height:100%;}
    .pos-container .panel-invoice .calculator-roll li:nth-child(even) {background: #f0f4c3}
    .pos-container .panel-invoice .calculator-item {border:1px solid trasparent;padding:0px;}
    .pos-container .panel-invoice .calculator-item:hover {border:1px solid silver;border-radius: 5px;}
    .pos-container .panel-invoice .calculator-roll {min-height:600px;}
</style>
@endsection
@section('content')
<div class="col-12 text-center">
    <h4 class=""><b>{{$page_title}}</b></h4><hr>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <h5>Item Already Exists</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="qtyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <h5>Out of Stock</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="col-md-7">
<div class="container pos-container"> 
    <div class="row">
        <div class="col-md-8">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-barcode" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control searchProduct" name="search_product" placeholder="Product with Name" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="displayItems"></div>
            <div class="tab-container pos-body">
                <ul class="list-unstyled">
                    @foreach ($list['data'] as $key => $value)
                    @php
                        $colors = ['#4c697a','#213A5C', '#13315c'];
                        $colorIndex = $key % count($colors);
                        $color = $colors[$colorIndex];
                    @endphp
                    <li class="item" style="background-color: {{$color}};">
                        <a href="#" onclick="getStockItem({{$value['id']}})" value="{{$value['price']}}"><div class="text-center p-3 text-white">{{$value['title']}}</div></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
<div class="col-md-5">
    <div class="card">
        <div class="card-body">
            <form action="{{url('dashboard/sale_product')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" class="form-control customer_name" id="customer_name" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
                    <div class="display">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div>
                <div class="form-group mb-5">
                    <label for="stylist" class="form-label">Stylist</label>
                    <select name="emp_id" id="emp_id" class="form-control">
                        <option>Select Stylist</option>
                        @foreach($employees as $val)
                        <option value="{{$val->id}}">{{$val->first_name}}</option>
                        @endforeach
                    </select>
                </div> 
                    
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreRow">
                                    
                                </tbody>
                                <tfoot class="billAmount">
                                    <tr>
                                        <th scope="row">Total</th>
                                        <td><input type="text" name="total_bill" class="form-control total_bill" readonly style="border: none"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Discount</th>
                                        <td><input type="text" name="discount" class="form-control discount"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payable Amount</th>
                                        <td><input type="text" name="payable_amount" class="form-control payable_amount" readonly style="border: none"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group p-3">
                    <input type="submit" class="btn btn-primary" value="Confirm Order">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    
    function getStockItem(id,price,title){
        
        $.ajax({
            url: "{{ url('dashboard/getStock') }}"+"/"+id,
            success:function(response){
                if(response.qty < 0 || response.qty == 0){
                    $('#qtyModal').modal('show');
                }else{
                    let check;
                    var rowCount = $(".addMoreRow tr").length;
                    var tr = "<tr><td>"+response.title+"</td>"+
                        "<td><input type='hidden' name='item[]' class='form-control item' value='"+response.id+"'><input type='number' name='qty[]' min='1' class='form-control qty' required></td>"+
                        "<td><input type='text' name='price[]' class='form-control price' value='"+response.price+"'></td>"+
                        "<td><input type='text' name='total[]' class='form-control total' value=''></td>"+
                        "<td><button' class='btn btn-danger delete'><i class='fa fa-times' aria-hidden='true'></i></button></td>"
                        "</tr>";
                        
                        $(".item").each(function(){
                            let item_id = $(this).val();
                            if(item_id == id){
                                check = 1;
                            }else {
                                check = 0;
                            }
                        });
                        
                        if(check == 1){
                            $('#modal').modal('show');
                        }else{
                            $('.addMoreRow').append(tr);
                        }
                    }
                    // let check;
                    // var rowCount = $(".addMoreRow tr").length;
                    // var tr = "<tr><td>"+response.title+"</td>"+
                        //     "<td><input type='hidden' name='item[]' class='form-control item' value='"+response.id+"'><input type='number' name='qty[]' min='1' class='form-control qty' required></td>"+
                        //     "<td><input type='text' name='price[]' class='form-control price' value='"+response.per_price+"'></td>"+
                        //     "<td><input type='text' name='total[]' class='form-control total' value=''></td>"+
                        //     "<td><button' class='btn btn-danger delete'><i class='fa fa-times' aria-hidden='true'></i></button></td>"
                        //     "</tr>";
                        
                        //     $(".item").each(function(){
                            //         let item_id = $(this).val();
                            //         if(item_id == id){
                                //             check = 1;
                                //         }else {
                                    //             check = 0;
                                    //         }
                                    //     });
                                    
                                    //     if(check == 1){
                                        //         $('#modal').modal('show');
                                        //     }else{
                                            //         $('.addMoreRow').append(tr);
                                            //     }
                                            
                                        }
                                    });     
                                }
                                $('.addMoreRow').delegate('.delete','click',function(){
                                    $(this).parent().parent().remove();
                                });
                                
                                function totalAmount(){
                                    var total=0;
                                    $('.total').each(function(i,e){
                                        var amount = parseInt($(this).val());
                                        total+=amount;
                                    });
                                    $('.total_bill').val(total);
                                    $('.payable_amount').val(total);
                                }
                                
                                $('.addMoreRow').delegate('.qty','keyup change',function(){
                                    var tr=$(this).parent().parent();
                                    var qty = parseInt(tr.find('.qty').val());
                                    var price = parseInt(tr.find('.price').val());
                                    total=qty*price;
                                    tr.find('.total').val(total);
                                    totalAmount();
                                    
                                });
                                
                                $('.discount').on('keyup',function(){
                                    var discount = parseInt($(this).val());
                                    var total_bill = parseInt($('.total_bill').val());
                                    var payable_amount = total_bill - discount;
                                    $('.payable_amount').val(payable_amount);
                                });
                                
                                
                                
                                $('.customer_name').on('keyup',function(){
                                    searchValue = $(this).val();
                                    $.ajax({
                                        url: "{{ url('dashboard/getCustomer') }}",
                                        data: {
                                            search: searchValue,
                                        },
                                        success:function(response){
                                            var output = '<ul class="list-group displayCustomer">';
                                                $.each(response, function(key, val){
                                                    output += '<li class="list-group-item selectSearchCustomer">'+val.name+'</li>';       
                                                });
                                                output += '</ul>';
                                                $('.display').html(output);
                                                if($(".customer_name").val() == ""){
                                                    $(".displayCustomer").remove();
                                                }
                                                
                                                $('.selectSearchCustomer').click(function(){
                                                    var customerName = $(this).html();
                                                    $('.customer_name').val(customerName);
                                                    $(".displayCustomer").remove();
                                                });
                                            }
                                        });
                                    });
                                    
                                    $('.searchProduct').on('keyup',function(){
                                        searchValue = $(this).val();
                                        $.ajax({
                                            url: "{{ url('dashboard/getItems') }}",
                                            data: {
                                                search: searchValue,
                                            },
                                            success:function(response){
                                                console.log(response);
                                                var output = '<ul class="list-group displayItemsList">';
                                                    $.each(response, function(key, val){
                                                        output += '<li class="list-group-item selectSearchItems" onclick="getStockItem('+val.id+')">'+val.title+'</li>';       
                                                    });
                                                    output += '</ul>';
                                                    $('.displayItems').html(output);
                                                    if($(".display_item").val() == ""){
                                                        $(".displayItemsList").remove();
                                                    }
                                                    
                                                    $('.selectSearchItems').click(function(){
                                                        var itemName = $(this).html();
                                                        $('.searchProduct').val(itemName);
                                                        $(".displayItemsList").remove();
                                                    });
                                                }
                                            });
                                        });
                                        
                                    </script>
                                    @endsection