<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Stock Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('styles')
    
</head>

<body class="body">
    
    <div id="preloader">
        <div class="loader"></div>
    </div>
    
    <div class="horizontal-main-wrapper">
        
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('assets/images/icon/logo2.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="{{asset('assets/images/author/avatar.png')}}" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{@Auth::user()->first_name}}<i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/userAccounts/edit/'.Auth::id())}}">Settings</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-area header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9  d-none d-lg-block">
                    <div class="horizontal-menu">
                        <nav>
                            <ul id="nav_menu">
                                <li>
                                    <a href="{{ url('/dashboard') }}"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                    {{-- <ul class="submenu">
                                        <li><a href="index.html">ICO dashboard</a></li>
                                        <li><a href="index2.html">Ecommerce dashboard</a></li>
                                        <li><a href="index3.html">SEO dashboard</a></li>
                                    </ul> --}}
                                </li>
                                
                                @if (@Auth::user()->roles === 1)
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-building" aria-hidden="true"></i><span>Companies & Heads</span></a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Companies List' ? 'active':''}}"><a href="{{url('dashboard/companies')}}">Companies</a></li>
                                        <li class="{{ $page_title == 'Employees List' ? 'active':''}}"><a href="{{url('dashboard/employees')}}">Company Heads</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-university" aria-hidden="true"></i><span>Banks & Accounts</span></a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Banks List' ? 'active':''}}"><a href="{{url('dashboard/banks')}}">Banks</a></li>
                                        <li class="{{ $page_title == 'Accounts List' ? 'active':''}}"><a href="{{url('dashboard/accounts')}}">Accounts</a></li>
                                    </ul>
                                </li>
                                @endif
                                
                                @if (@Auth::user()->roles === 2)
                                <li>
                                    <a href="javascript:void(0)"><i class="ti-dashboard"></i><span>Offices</span></a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Offices List' ? 'active':''}}"><a href="{{url('dashboard/offices')}}">Offices</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0)"><i class="ti-dashboard"></i><span>Office Managers</span></a>
                                    <ul class="submenu">
                                        <li><a href="{{url('dashboard/employees')}}">Managers</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if (@Auth::user()->roles === 3)
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-users"></i><span>Employees & Sub Dealers</span>
                                    </a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Employes List' ? 'active':''}}"><a href="{{url('dashboard/employes')}}">Employees</a></li>
                                        <li class="{{ $page_title == 'Sub Dealers List' ? 'active show':''}}"><a href="{{url('dashboard/subDealers')}}">Sub Dealers</a></li>
                                        <li class="{{ $page_title == 'Customers List' ? 'active':''}}"><a href="{{url('dashboard/customers')}}">Customers</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-money" aria-hidden="true"></i><span>Expenses & Miscellaneous</span>
                                    </a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Employes List' ? 'active':''}}"><a href="{{url('dashboard/expenses/expenseType')}}">Expense Types</a></li>
                                        <li class="{{ $page_title == 'Expenses List' ? 'active':''}}"><a href="{{url('dashboard/expenses')}}">Expenses</a></li>
                                        <li class="{{ $page_title == 'Customers List' ? 'active':''}}"><a href="{{url('dashboard/miscellaneouses')}}">Miscellaneous</a></li>
                                    </ul>
                                </li>
                                
                                <li class="mega-menu">
                                    <a href="javascript:void(0)"><i class="fa fa-th-large" aria-hidden="true"></i><span>Stock Management</span></a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Brands List' ? 'active':''}}"><a href="{{url('dashboard/brands')}}">Brands</a></li>
                                        <li class="{{ $page_title == 'Suppliers List' ? 'active':''}}"><a href="{{url('dashboard/suppliers')}}">Supplier</a></li>
                                        <li class="{{ $page_title == 'Item Types List' ? 'active':''}}"><a href="{{url('dashboard/items/itemTypes')}}">Item Type</a></li>
                                        <li class="{{ $page_title == 'Items List' ? 'active':''}}"><a href="{{url('dashboard/items')}}">Items</a></li>
                                        <li class="{{ $page_title == 'Purchases List' ? 'active':''}}"><a href="{{url('dashboard/purchases')}}">Purchases</a></li>
                                        <li class="{{ $page_title == 'Stocks List' ? 'active':''}}"><a href="{{url('dashboard/allStock')}}">All Stock</a></li>
                                        <li class="{{ $page_title == 'Orders List' ? 'active':''}}"><a href="{{url('dashboard/orders')}}">Sales</a></li>
                                        <li class="{{ $page_title == 'Storage Areas List' ? 'active':''}}"><a class="dropdown-item" href="{{url('dashboard/storageAreas')}}">Storage Area</a></li>
                                        <li class="{{ $page_title == 'Documents List' ? 'active':''}}"><a href="{{url('dashboard/documents')}}">Documents</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-file-text" aria-hidden="true"></i><span>Reports</span>
                                    </a>
                                    <ul class="submenu">
                                        <li class="{{ $page_title == 'Summary Reports' ? 'active':''}}"><a href="{{url('dashboard/reports/summaryReports/')}}">Summary Report</a></li>
                                        <li class="{{ $page_title == 'Daily Reports' ? 'active':''}}"><a href="{{url('dashboard/reports/dailyReport/')}}">Daily Report</a></li>
                                        <li class="{{ $page_title == 'Monthly Reports List' ? 'active':''}}"><a href="{{url('dashboard/reports/monthlyReport/')}}">Monthly Report</a></li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="{{url('dashboard/pos')}}">
                                        <i class="fa fa-usd" aria-hidden="true"></i><span>Point of Sale</span>
                                    </a>
                                    <ul class="submenu">
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div id="mobile_menu"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-content-inner">
        <div class="container">
            <div class="row p-3">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/line-chart.js')}}"></script>
<script src="{{asset('assets/js/pie-chart.js')}}"></script>
<script src="{{asset('assets/js/bar-chart.js')}}"></script>
<script src="{{asset('assets/js/maps.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{env('GLOBAL_SCRIPT')}}"></script>
<script type="text/javascript">
    baseJS.init(
    {
        "site_url": "{{url('/')}}",
        "current_url":"{{URL::current()}}",
        "voice_input":true,
        "lang":"en"
    }
    );
</script>
@yield('scripts')
</body>

</html>
