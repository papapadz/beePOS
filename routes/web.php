<?php

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

    Auth::routes();
    Route::get('/', function() {
        return view('landing');
    });
    //Route::get('home', 'HomeController@index')->name('home');
    
    Route::get('getters/product/get','GettersController@getProduct')->name('get.product')->middleware('isAdmin');
    Route::get('getters/product/find/get','GettersController@getProductInfo')->middleware('isAdmin');
    Route::get('getters/product/category/get','GettersController@getProductCategoryInfo')->middleware('isAdmin');
    Route::get('getters/sales/get','GettersController@getSales')->middleware('isAdmin');
    Route::get('getters/transactions/sales/items/get','GettersController@getTransactionSales')->middleware('isAdmin');
    Route::get('getters/green-perks/get','GettersController@getPerksInfo')->middleware('isAdmin');
    Route::get('getters/today/daily-report','GettersController@getClosingDetails')->middleware('isAdmin');
    Route::get('getters/daily-cashin-cashout/get','GettersController@getDailyCashinCashout')->middleware('isAdmin');
    Route::get('getters/expense-categories/get','GettersController@getExpenseCategories')->middleware('isAdmin');
    Route::get('getters/expense-names/get','GettersController@getExpenseNames')->middleware('isAdmin');
    Route::get('getters/expense-reports/get','GettersController@getExpenseReports')->middleware('isAdmin');
    Route::get('getters/expense-reports/by-month/get','GettersController@getExpenseReportsByMonth')->middleware('isAdmin');
    Route::get('getters/expense-summary/get','GettersController@getExpenseSummary')->middleware('isAdmin');
    Route::get('getters/expenses/list/get','GettersController@getExpenseList')->middleware('isAdmin');
    Route::get('getters/product_trends/get','GettersController@getProductTrends')->middleware('isAdmin');
    Route::get('getters/users/find/get','GettersController@getUser')->middleware('isAdmin');
    
    Route::get('print/receipt/{id}','AdminController@generatereceipt');

Route::group(['prefix' => '/{shop}'], function() {

    /**NEW ROUTES*/
    Route::get('/', 'PageViewController@index');
    Route::get('login', 'PageViewController@showLogin')->name('shop.showlogin');
    Route::post('login', 'PageViewController@login')->name('shop.login');

    Route::get('index', 'ShopController@index')->name('shop.index');
    /******END NEW ROUTES***********/ 

    Route::group(['middleware' => ['auth']], function(){
        
        //Route::post('menu', 'AdminController@checklogin');
    
        Route::get('menu', [
            'uses' => 'AdminController@viewMenu',
            'as' => 'view.menu'
        ])->middleware('isAdmin');
    
        Route::get('sales',[
            'uses' => 'AdminController@viewSales',
            'as' => 'view.sales'
        ])->middleware('isAdmin');
    
        Route::get('products',[
            'uses' => 'AdminController@viewProducts',
            'as' => 'view.products'
        ])->middleware('isAdmin');
    
        Route::get('products/categories','AdminController@viewProductCategories')->middleware('isAdmin');
        
        Route::get('users',[
            'uses' => 'AdminController@viewUsers',
            'as' => 'view.users'
        ])->middleware('isAdmin');
    
        Route::get('customers',[
            'uses' => 'AdminController@viewCustomers',
            'as' => 'view.customer'
        ])->middleware('isAdmin');
    
        Route::get('customers/credits','AdminController@viewCustomerCredits')->middleware('isAdmin');
        
        Route::get('reports',[
            'uses' => 'AdminController@viewReports',
            'as' => 'view.reports'
        ])->middleware('isAdmin');
    
        Route::get('logout',[
            'uses' => 'AdminController@logout',
            'as' => 'view.logout'
        ]);
    
        Route::get('beginning-balance/set/save','SettersController@setBeginningBalance')->name('set.beginningbalance')->middleware('isAdmin');
        Route::get('beginning/reset','SettersController@openSalesMenu')->middleware('isAdmin');
        Route::get('sales/new/save',[
            'uses' => 'SettersController@setSales',
            'as' => 'sales.new'
        ])->middleware('isAdmin');

        Route::get('sales/pay/save','SettersController@setPaymentSales')->middleware('isAdmin');
        Route::get('sales/delete/this','SettersController@deleteSales')->middleware('isAdmin');
        Route::get('sales/add/transaction/{tid}','AdminController@addTransactionItems')->middleware('isAdmin');
        Route::get('sales/add/items/save','SettersController@setSales')->name('sales.save.item')->middleware('isAdmin');
        Route::get('extra-charge/new/save','SettersController@setExtraCharges')->middleware('isAdmin');
        Route::post('products/new/save','SettersController@setNewProduct')->middleware('isAdmin');
        Route::get('product/categories/new/save','SettersController@setNewProductCategory')->middleware('isAdmin');
        Route::get('products/delete/this','SettersController@deleteProduct')->middleware('isAdmin');
        Route::get('products/categories/delete/this','SettersController@deleteProductCategory')->middleware('isAdmin');
        Route::get('credits/new/save','SettersController@setNewCredit')->middleware('isAdmin');
        Route::get('store/closing-details/save','SettersController@setClosingDetails')->middleware('isAdmin');
        Route::get('expense/new/save','SettersController@setExpense')->middleware('isAdmin');
        Route::get('expense-name/new/save','SettersController@addExpenseNames')->middleware('isAdmin');
        Route::get('expense/delete/this','SettersController@deleteExpense')->middleware('isAdmin');
        Route::get('expense-categories/add','SettersController@addExpenseCategories')->middleware('isAdmin');
        Route::get('expense-categories/delete/this','SettersController@delExpenseCategories')->middleware('isAdmin');
        Route::get('users/new/save','SettersController@setNewUser')->middleware('isAdmin');
        Route::get('users/delete/this','SettersController@deleteUser')->middleware('isAdmin');
        Route::get('reports/sales/add','SettersController@addNewSalesReport')->middleware('isAdmin');
    });
});


