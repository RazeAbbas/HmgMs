<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
   <body>
      <div id="app">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><h3>Stock Management</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                  </li>
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="{{url('dashboard/categories')}}">Categories</a>
                  </li> --}}
                  @if (@Auth::user()->roles == 1)
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Companies & Roles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('dashboard/companies')}}">Companies</a>
                        <a class="dropdown-item" href="{{url('dashboard/employees')}}">Company Head</a>
                        <a class="dropdown-item" href="{{url('dashboard/banks')}}">Banks</a>
                        <a class="dropdown-item" href="{{url('dashboard/accounts')}}">Account</a>
                        </div>
                     </li>
                  @endif

                  @if (@Auth::user()->roles == 2)
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Offices & Roles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('dashboard/offices')}}">Offices</a>
                        <a class="dropdown-item" href="{{url('dashboard/employees')}}">Office Manager</a>
                        {{-- <a class="dropdown-item" href="{{url('dashboard/banks')}}">Banks</a>
                        <a class="dropdown-item" href="{{url('dashboard/accounts')}}">Account</a> --}}
                        </div>
                     </li>
                  @endif

                  @if (@Auth::user()->roles == 3)
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Employees & Sub Dealers
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('dashboard/employes')}}">Employees</a>
                     <a class="dropdown-item" href="{{url('dashboard/subDealers')}}">Sub Dealers</a>
                     <a class="dropdown-item" href="{{url('dashboard/customers')}}">Customers</a>
                     </div>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Stock Management
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('dashboard/allStock')}}">All Stock</a>
                        <a class="dropdown-item" href="{{url('dashboard/orders')}}">Sales</a>
                        <a class="dropdown-item" href="{{url('dashboard/storageAreas')}}">Storage Area</a>
                     </div>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Expenses
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('dashboard/expenses/expenseType')}}">Expense Types</a>
                     <a class="dropdown-item" href="{{url('dashboard/expenses')}}">Expenses</a>
                     </div>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Stock
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('dashboard/brands')}}">Brands</a>
                     <a class="dropdown-item" href="{{url('dashboard/suppliers')}}">Supplier</a>
                     <a class="dropdown-item" href="{{url('dashboard/items/itemTypes')}}">Item Type</a>
                     <a class="dropdown-item" href="{{url('dashboard/items')}}">Items</a>
                     <a class="dropdown-item" href="{{url('dashboard/purchases')}}">Purchases</a>
                     </div>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Documents
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('dashboard/documents')}}">Documents</a>
                     </div>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Reports
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('dashboard/reports/summaryReports/')}}">Summary Report</a>
                     <a class="dropdown-item" href="{{url('dashboard/reports/dailyReport/')}}">Daily Report</a>
                     <a class="dropdown-item" href="{{url('dashboard/reports/monthlyReport/')}}">Monthly Report</a>
                     </div>
                  </li>
               @endif

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{@Auth::user()->first_name}}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('dashboard/userAccounts/edit/'.Auth::id())}}">Account Setting</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                        </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                     </form>
                     </div>
                  </li>
               </ul>
               <div>
                  
                  {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                  </form> --}}
               </div>
            </div>
         </nav>
         <main class="py-4">
            @yield('content')
         </main>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
   </body>
</html>