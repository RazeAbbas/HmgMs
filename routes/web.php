<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front website routes
// Route::get('/', function () {
//     return view('front-website/index');
// });

    Route::get('/', function () {
        return view('front-website.index');
    });
    Route::get('/blog', function () {
        return view('front-website.blog');
    });
    Route::get('/team', function () {
        return view('front-website.team');
    });
    Route::get('/services', function () {
        return view('front-website.services');
    });
    Route::get('/post', function () {
        return view('front-website.post');
    });
    
    Auth::routes();
    // Route::get('/',function(){
    //     return redirect('login');
    // });
    Route::get('/dashboard', 'DashboardController@index');
    Route::prefix('dashboard')->group(function () {
        
        Route::middleware(['can:isOwner'])->group(function () {
            Route::get('/companies','CompanyController@list');
            Route::get('/companies/create','CompanyController@create');
            Route::post('/companies/create','CompanyController@create');
            Route::get('/companies/edit/{id?}','CompanyController@update');
            Route::post('/companies/edit/{id?}','CompanyController@update');
            Route::get('/companies/delete/{id?}','CompanyController@delete');
            Route::post('/companies/update/_bulk','CompanyController@_bulk');
            
            Route::get('/banks','BankController@list');
            Route::get('/banks/create','BankController@create');
            Route::post('/banks/create','BankController@create');
            Route::get('/banks/edit/{id?}','BankController@update');
            Route::post('/banks/edit/{id?}','BankController@update');
            Route::get('/banks/delete/{id?}','BankController@delete');
            
            Route::get('/accounts','AccountController@list');
            Route::get('/accounts/create','AccountController@create');
            Route::post('/accounts/create','AccountController@create');
            Route::get('/accounts/edit/{id?}','AccountController@update');
            Route::post('/accounts/edit/{id?}','AccountController@update');
            Route::get('/accounts/delete/{id?}','AccountController@delete');
            Route::post('/accounts/delete/{id?}','AccountController@delete');
        });
        
        Route::middleware(['can:isHeadOrOwner'])->group(function(){
            Route::get('/offices','OfficeController@list');
            Route::get('/offices/create','OfficeController@create');
            Route::post('/offices/create','OfficeController@create');
            Route::get('/offices/edit/{id?}','OfficeController@update');
            Route::post('/offices/edit/{id?}','OfficeController@update');
            Route::get('offices/delete/{id?}','OfficeController@delete');
            
            Route::get('/employees','EmployeeController@list');
            Route::get('/employees/create','EmployeeController@create');
            Route::post('/employees/create','EmployeeController@create');
            Route::get('/employees/edit/{id?}','EmployeeController@update');
            Route::post('/employees/edit/{id?}','EmployeeController@update');
            Route::get('employees/delete/{id?}','EmployeeController@delete');
            Route::get('/employees/employees-document/{id?}','EmployeeController@employeesDocument');
            
        });
        
        Route::middleware(['can:isManager'])->group(function(){
            Route::get('/employes','EmployeController@list');
            Route::get('/employes/create','EmployeController@create');
            Route::post('/employes/create','EmployeController@create');
            Route::get('/employes/edit/{id?}','EmployeController@update');
            Route::post('/employes/edit/{id?}','EmployeController@update');
            Route::get('/employes/delete/{id?}','EmployeController@delete');
            Route::get('/employes/detail/{id?}','EmployeController@detail');
            Route::get('/employes/employes-document/{id?}','EmployeController@employesDocument');
            
            Route::get('/employeePayments/list/{id?}','EmployeePaymentController@list');
            Route::get('/employeePayments/create/{id?}','EmployeePaymentController@create');
            Route::post('/employeePayments/create','EmployeePaymentController@create');
            Route::get('/employeePayments/edit/{id?}','EmployeePaymentController@update');
            Route::post('/employeePayments/edit/{id?}','EmployeePaymentController@update');
            Route::get('/employeePayments/delete/{id?}','EmployeePaymentController@delete');
            Route::get('/employeePayments/filter/{id?}','EmployeePaymentController@paymentFilter');
            
            Route::get('/expenses/expenseType','ExpenseTypeController@list');
            Route::get('/expenses/expenseType/create','ExpenseTypeController@create');
            Route::post('/expenses/expenseType/create','ExpenseTypeController@create');
            Route::get('/expenses/expenseType/edit/{id?}','ExpenseTypeController@update');
            Route::post('/expenses/expenseType/edit/{id?}','ExpenseTypeController@update');
            Route::get('/expenses/expenseType/delete/{id?}','ExpenseTypeController@delete');
            
            Route::get('/expenses','ExpenseController@list');
            Route::get('/expenses/create','ExpenseController@create');
            Route::post('/expenses/create','ExpenseController@create');
            Route::get('/expenses/edit/{id?}','ExpenseController@update');
            Route::post('/expenses/edit/{id?}','ExpenseController@update');
            Route::get('/expenses/delete/{id?}','ExpenseController@delete');
            
            Route::get('/brands','BrandController@list');
            Route::get('/brands/create','BrandController@create');
            Route::post('/brands/create','BrandController@create');
            Route::get('/brands/edit/{id?}','BrandController@update');
            Route::post('/brands/edit/{id?}','BrandController@update');
            Route::get('/brands/delete/{id?}','BrandController@delete');
            Route::post('/brands/update/_bulk','BrandController@_bulk');
            
            Route::get('/suppliers','SupplierController@list');
            Route::get('/suppliers/create','SupplierController@create');
            Route::post('/suppliers/create','SupplierController@create');
            Route::get('/suppliers/edit/{id?}','SupplierController@update');
            Route::post('/suppliers/edit/{id?}','SupplierController@update');
            Route::get('/suppliers/delete/{id?}','SupplierController@delete');
            Route::get('/suppliers/ledger/{id}','SupplierController@ledger');
            
            Route::get('/suppliers','SupplierController@list');
            Route::get('/suppliers/create','SupplierController@create');
            Route::post('/suppliers/create','SupplierController@create');
            Route::get('/suppliers/edit/{id?}','SupplierController@update');
            Route::post('/suppliers/edit/{id?}','SupplierController@update');
            Route::get('/suppliers/delete/{id?}','SupplierController@delete');
            
            Route::get('/suppliers/quickPayments/create/{id?}','QuickPaymentController@create');
            Route::post('/suppliers/quickPayments/create','QuickPaymentController@create');
            
            Route::get('/subDealers','SubDealerController@list');
            Route::get('/subDealers/create','SubDealerController@create');
            Route::post('/subDealers/create','SubDealerController@create');
            Route::get('/subDealers/edit/{id?}','SubDealerController@update');
            Route::post('/subDealers/edit/{id?}','SubDealerController@update');
            Route::get('/subDealers/delete/{id?}','SubDealerController@delete');
            Route::get('/subDealers/ledger/{id?}','SubDealerController@ledger');
            Route::post('/subDealers/importSubdealers','SubDealerController@importSubdealers');
            Route::get('/subDealers/exportSubdealers','SubDealerController@exportSubdealers');
            
            Route::get('/customers','CustomerController@list');
            Route::get('/customers/create','CustomerController@create');
            Route::post('/customers/create','CustomerController@create');
            Route::get('/customers/edit/{id?}','CustomerController@update');
            Route::post('/customers/edit/{id?}','CustomerController@update');
            Route::get('/customers/delete/{id?}','CustomerController@delete');
            
            Route::get('/attendance','AttendanceController@index');
            Route::get('/attendance/create','AttendanceController@create');
            Route::post('/attendance/create','AttendanceController@create');
            Route::get('/attendance/edit/{id?}','AttendanceController@update');
            Route::post('/attendance/edit/{id?}','AttendanceController@update');
            Route::get('/attendance/delete/{id?}','AttendanceController@delete');
            
            Route::get('/miscellaneouses','MiscellaneousController@list');
            Route::get('/miscellaneouses/create','MiscellaneousController@create');
            Route::post('/miscellaneouses/create','MiscellaneousController@create');
            Route::get('/miscellaneouses/edit/{id?}','MiscellaneousController@update');
            Route::post('/miscellaneouses/edit/{id?}','MiscellaneousController@update');
            Route::get('/miscellaneouses/delete/{id?}','MiscellaneousController@delete');
            
            Route::get('/subDealers/transactions','TransactionController@list');
            Route::get('/subDealers/transactions/create/{id?}','TransactionController@create');
            Route::post('/subDealers/transactions/create','TransactionController@create');
            Route::get('/subDealers/transactions/edit/{id?}','TransactionController@update');
            Route::post('/subDealers/transactions/edit/{id?}','TransactionController@update');
            Route::get('/subDealers/transactions/delete/{id?}','TransactionController@delete');
            
            Route::get('/items/itemTypes','ItemTypeController@list');
            Route::get('/items/itemTypes/create','ItemTypeController@create');
            Route::post('items/itemTypes/create','ItemTypeController@create');
            Route::get('/items/itemTypes/edit/{id?}','ItemTypeController@update');
            Route::post('/items/itemTypes/edit/{id?}','ItemTypeController@update');
            Route::get('/items/itemTypes/delete/{id?}','ItemTypeController@delete');
            
            Route::get('/items','ItemController@list');
            Route::get('/items/create','ItemController@create');
            Route::post('/items/create','ItemController@create');
            Route::get('/items/edit/{id?}','ItemController@update');
            Route::post('/items/edit/{id?}','ItemController@update');
            Route::get('/items/delete/{id?}','ItemController@delete');
            
            Route::get('/purchases','PurchaseController@list');
            Route::get('/purchases/create','PurchaseController@create');
            Route::post('/purchases/create','PurchaseController@create');
            Route::get('/purchases/edit/{id?}','PurchaseController@update');
            Route::post('/purchases/edit/{id?}','PurchaseController@update');
            Route::get('/purchases/delete/{id?}','PurchaseController@delete');
            Route::post('/purchases/update/_bulk','PurchaseController@_bulk');
            
            Route::get('/stocks/{id?}','StockController@list');
            Route::get('/stocks/create/{id?}','StockController@create');
            Route::post('/stocks/create/{id?}','StockController@create');
            Route::get('/stocks/edit/{id?}','StockController@update');
            Route::post('/stocks/edit/{id?}','StockController@update');
            Route::get('/allStock','StockController@allStock');
            Route::get('/stocks/delete/{id?}','StockController@delete');
            
            Route::get('/orders','OrderController@list');
            Route::get('/orders/create/{id?}','OrderController@create');
            Route::post('/orders/create/{id?}','OrderController@create');
            Route::get('/orders/edit/{id?}','OrderController@update');
            Route::post('/orders/edit/{id?}','OrderController@update');
            Route::get('/orders/delete/{id?}','OrderController@delete');
            
            Route::get('/stockDetails/list/{id?}','StockDetailController@list');
            Route::get('/stockDetails/create/{id?}','StockDetailController@create');
            Route::post('/stockDetails/create','StockDetailController@create');
            Route::get('/stockDetails/edit/{id?}','StockDetailController@update');
            Route::post('/stockDetails/edit/{id?}','StockDetailController@update');
            Route::get('/stockDetails/delete/{id?}','StockDetailController@delete');
            
            Route::get('/documents','DocumentController@list');
            Route::get('/documents/create/{id?}','DocumentController@create');
            Route::post('/documents/create','DocumentController@create');
            Route::get('/documents/edit/{id?}','DocumentController@update');
            Route::post('/documents/edit/{id?}','DocumentController@update');
            Route::get('/documents/delete/{id?}','DocumentController@delete');
            Route::get('/documents/download/{id?}','DocumentController@download');
            
            Route::get('/packages','PackageController@list');
            Route::get('/packages/create/{id?}','PackageController@create');
            Route::post('/packages/create','PackageController@create');
            Route::get('/packages/edit/{id?}','PackageController@update');
            Route::post('/packages/edit/{id?}','PackageController@update');
            Route::get('/packages/delete/{id?}','PackageController@delete');
            Route::get('/packages/download/{id?}','PackageController@download');
            
            Route::get('/storageAreas','StorageAreaController@list');
            Route::get('/storageAreas/create/{id?}','StorageAreaController@create');
            Route::post('/storageAreas/create','StorageAreaController@create');
            Route::get('/storageAreas/edit/{id?}','StorageAreaController@update');
            Route::post('/storageAreas/edit/{id?}','StorageAreaController@update');
            Route::get('/storageAreas/delete/{id?}','StorageAreaController@delete');
            
            Route::get('/reports/summaryReports','ReportController@summaryReportList');
            Route::get('/reports/monthlyReport','ReportController@monthlyReportlist');
            // Route::get('/reports/monthlyReportDownload','ReportController@monthlyReportDownload');
            Route::get('/reports/dailyReport','ReportController@dailyReportList');
            // Route::get('/reports/summaryReports/create/{id?}','StorageAreaController@create');
            // Route::post('/reports/summaryReports/create','StorageAreaController@create');
            // Route::get('/reports/summaryReports/edit/{id?}','StorageAreaController@update');
            // Route::post('/reports/summaryReports/edit/{id?}','StorageAreaController@update');
            Route::get('/pos','PosController@list');
            Route::get('/getStock/{id}','PosController@getStock');
            Route::get('/getCustomer','PosController@getCustomer');
            Route::get('/getItems','PosController@getItems');
            Route::post('/sale_product','PosController@saleProduct');
            Route::get('/receipt','PosController@receipt');
        });
        Route::get('test',function(){
            return view('test');
        });
        Route::get('/receipt1',function(){
            return view("pos/receipt1");
        });
        
        Route::get('userAccounts/edit/{id?}','UserAccountController@update');
        Route::post('userAccounts/edit/{id?}','UserAccountController@update');
    });