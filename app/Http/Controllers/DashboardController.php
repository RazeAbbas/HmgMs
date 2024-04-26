<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Miscellaneous;
use App\Models\EmployeePayment;
use App\Models\Order;
use App\Models\Item;
use App\Models\Package;
use App\Models\Sale;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = "";
        // $order_sale = Order::sum("total_bill");
        // $pos_sale = Sale::sum("total");
        // dd($pos_sale + $order_sale);

        $data = array(
            "order_sale"=> Order::where("office_id","=",Auth::user()->office)->sum("total_bill"),
            "pos_sale"=>Sale::where("office_id","=",Auth::user()->office)->sum("total"),
            "expenses"=>Expense::where("office_id","=",Auth::user()->office)->sum("amount") + Miscellaneous::where("office_id","=",Auth::user()->office)->sum("amount"),
            "items"=>Package::where("office_id","=",Auth::user()->office)->count(),
            "emp_payments"=>EmployeePayment::where("office_id","=",Auth::user()->office)->sum("amount"),
        );
        return view('dashboard',compact('page_title','data'));
    }
}
