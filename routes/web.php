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
Route::get('/', ['as' => 'user.login', 'uses' => 'backend\UserController@index']);
Route::post('/admin-panel', ['as' => 'user.check', 'uses' => 'backend\UserController@login']);
Route::get('/track-location', ['as' => 'set.location.track', 'uses' => 'GeoController@tracklocation']);
Route::post('/location', 'GeoController@index')->name('location');

Route::get('/companies/create', ['as' => 'companies.create', 'uses' => 'backend\CompanyController@create']);
Route::post('/companies', ['as' => 'companies.store', 'uses' => 'backend\CompanyController@store']);
//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'Revalidate'],function() {
    Route::group(['middleware' => 'Authenticate'], function () {

        Route::get('/dashboard-panel', ['as' => 'user.dashboard', 'uses' => 'backend\DashboardController@index']);

        Route::get('/super/dashboard-panel', ['as' => 'superadmin.dashboard', 'uses' => 'backend\DashboardController@superadminindex']);
        Route::delete('/user-delete/{id}', ['as' => 'user.delete', 'uses' => 'backend\UserController@destroy']);
        Route::get('/user-edit/{id}', ['as' => 'user.edit', 'uses' => 'backend\UserController@edit']);
        Route::post('/user-update/{id}', ['as' => 'user.update', 'uses' => 'backend\UserController@update']);

        Route::get('/user-list', ['as' => 'user.list', 'uses' => 'backend\UserController@userlist']);
        Route::get('/user-register', ['as' => 'user.register', 'uses' => 'backend\UserController@create']);
        Route::post('/user-save', ['as' => 'user.store', 'uses' => 'backend\UserController@store']);
        Route::get('/change-password', ['as' => 'change.password', 'uses' => 'backend\UserController@changepassword']);
        Route::post('/change-save', ['as' => 'change.save', 'uses' => 'backend\UserController@changesave']);
        Route::get('/reset-password', ['as' => 'reset.password', 'uses' => 'backend\ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'reset.password.send', 'uses' => 'backend\ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'reset.password.token', 'uses' => 'backend\ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['as' => 'reset.password.save', 'uses' => 'backend\ResetPasswordController@reset']);


        Route::get('/logout', ['as' => 'user.logout', 'uses' => 'backend\UserController@logout']);
        
Route::delete('/servicetype-delete/{id}', ['as' => 'servicetype.delete', 'uses' => 'backend\ServiceorderController@servicetypedelete']);
        Route::get('/serviceorder-list', ['as' => 'serviceorder.list', 'uses' => 'backend\ServiceorderController@index']);
        Route::get('/servicetype-create', ['as' => 'create.servicetype', 'uses' => 'backend\ServiceorderController@createservicetype']);
        Route::post('/servicetype-store', ['as' => 'servicetype.store', 'uses' => 'backend\ServiceorderController@storeservicetype']);
        Route::get('/servicetype-list', ['as' => 'servicetype.list', 'uses' => 'backend\ServiceorderController@servicetypelist']);
Route::get('/serviceorder-create', ['as' => 'serviceorder.create', 'uses' => 'backend\ServiceorderController@serviceordercreate']);
Route::post('/serviceorder-create1', ['as' => 'service.order.create', 'uses' => 'backend\ServiceorderController@serviceordercreate1']);
Route::post('/serviceorder-store', ['as' => 'service.order.store', 'uses' => 'backend\ServiceorderController@serviceorderstore']);

Route::get('/reminder-service', ['as' => 'service.reminder', 'uses' => 'backend\ServiceorderController@getreminderlist']);
Route::post('/reminder-post', ['as' => 'reminder.post', 'uses' => 'backend\ServiceorderController@postremindermessage']);
Route::get('/serviceorder-tech-create', ['as' => 'serviceorder.tech.create', 'uses' => 'backend\ServiceorderController@serviceordertechcreate']);
Route::post('/serviceorder-tech-create1', ['as' => 'service.order.tech.create', 'uses' => 'backend\ServiceorderController@serviceordertechcreate1']);
Route::post('/serviceorder-techstore', ['as' => 'service.order.tech.store', 'uses' => 'backend\ServiceorderController@serviceordertechstore']);

Route::get('/workorder-assign/{order_id}', ['as' => 'workorder.assign.create', 'uses' => 'backend\ServiceorderController@createworkorder_assign']);
Route::post('/postworkorder-assign', ['as' => 'workorder.assign.store', 'uses' => 'backend\ServiceorderController@storeworkorder_assign']);

Route::get('/order_task', ['as' => 'workorder.task.list', 'uses' => 'backend\ServiceorderController@order_task_list']);
Route::get('/workorder-taskupdate/{order_id}', ['as' => 'workorder.update.task', 'uses' => 'backend\ServiceorderController@order_task_update']);
Route::post('/workorder-updatestatus', ['as' => 'workorder.update.task.status', 'uses' => 'backend\ServiceorderController@order_update_status']);

        Route::get('/customer-list', ['as' => 'customer.list', 'uses' => 'backend\CustomerController@index']);
        Route::get('/customer-create', ['as' => 'create.customer', 'uses' => 'backend\CustomerController@create']);
        Route::post('/customer-store', ['as' => 'customer.store', 'uses' => 'backend\CustomerController@store']);
        Route::get('/customer-edit/{id}', ['as' => 'customer.edit', 'uses' => 'backend\CustomerController@edit']);
        Route::post('/customer-update/{id}', ['as' => 'customer.update', 'uses' => 'backend\CustomerController@update']);
        Route::delete('/customer-delete/{id}', ['as' => 'customer.delete', 'uses' => 'backend\CustomerController@destroy']);

        Route::get('/set-location', ['as' => 'set.location', 'uses' => 'backend\ServiceorderController@setlocation']);

        Route::get('/attendance_create', ['as' => 'Attendance.attendance.create', 'uses' => 'backend\AttendanceController@create']);
         Route::post('/attendance-store', ['as' => 'backend.attendance.store', 'uses' => 'backend\AttendanceController@store']);
         Route::get('/attendance-index', ['as' => 'backend.attendance.index', 'uses' => 'backend\AttendanceController@index']);
         Route::get('/attendance-show/{date}', ['as' => 'backend.attendance.show', 'uses' => 'backend\AttendanceController@show']);
         Route::get('/attendance-edit/{date}', ['as' => 'backend.attendance.edit', 'uses' => 'backend\AttendanceController@edit']);
         Route::post('/attendance-att_update', ['as' => 'backend.attendance.att_update', 'uses' => 'backend\AttendanceController@att_update']);
         Route::post('/attendance-destroy/{date}', ['as' => 'backend.attendance.destroy', 'uses' => 'backend\AttendanceController@destroy']);

          Route::get('/advancesalary-create', ['as' => 'Advsalary.advsalary.create', 'uses' => 'backend\AdvancedSalaryController@create']);
         Route::post('/advsalary-store', ['as' => 'backend.advanced_salary.store', 'uses' => 'backend\AdvancedSalaryController@store']);
         Route::get('/advsalary-index', ['as' => 'backend.advanced_salary.index', 'uses' => 'backend\AdvancedSalaryController@index']);
         Route::get('/advsalary-show/{id}', ['as' => 'backend.advanced_salary.show', 'uses' => 'backend\AdvancedSalaryController@show']);
         Route::get('/advsalary-edit/{id}', ['as' => 'backend.advanced_salary.edit', 'uses' => 'backend\AdvancedSalaryController@edit']);
         Route::post('/advsalary-update', ['as' => 'backend.advanced_salary.update', 'uses' => 'backend\AdvancedSalaryController@update']);
         Route::post('/advsalary-destroy/{id}', ['as' => 'backend.advanced_salary.destroy', 'uses' => 'backend\AdvancedSalaryController@destroy']);
         
         Route::get('/salary-index', ['as' => 'backend.salary.index', 'uses' => 'backend\SalaryController@index']);
          Route::get('/salary-create', ['as' => 'backend.salary.create', 'uses' => 'backend\SalaryController@create']);
         Route::post('/salary-store', ['as' => 'backend.salary.store', 'uses' => 'backend\SalaryController@store']);
         
        Route::get('/report-list', ['as' => 'reports.list', 'uses' => 'backend\ReportController@index']);
         Route::get('/sales-report', ['as' => 'sales.report', 'uses' => 'backend\ReportController@salesreport']);
         Route::post('/sales-reportpost', ['as' => 'sales.reportpost', 'uses' => 'backend\ReportController@salesreportpost']);
        
        Route::get('/module-create', ['as' => 'module.create', 'uses' => 'backend\ModuleController@create']);
        Route::post('/module-store', ['as' => 'module.store', 'uses' => 'backend\ModuleController@store']);
        Route::get('/module-list', ['as' => 'module.list', 'uses' => 'backend\ModuleController@index']);
        Route::get('/module-edit/{id}', ['as' => 'module.edit', 'uses' => 'backend\ModuleController@edit']);
        Route::post('/module-update/{id}', ['as' => 'module.update', 'uses' => 'backend\ModuleController@update']);

        Route::get('/role-create', ['as' => 'role.create', 'uses' => 'backend\RoleController@create']);
        Route::post('/role-store', ['as' => 'role.store', 'uses' => 'backend\RoleController@store']);
        Route::get('/role-list', ['as' => 'role.list', 'uses' => 'backend\RoleController@index']);
        Route::delete('/role-delete/{id}', ['as' => 'role.delete', 'uses' => 'backend\RoleController@destroy']);

        Route::get('/permission-create', ['as' => 'permission.create', 'uses' => 'backend\PermissionController@create']);
        Route::post('/permission-store', ['as' => 'permission.store', 'uses' => 'backend\PermissionController@store']);
        Route::get('/permission-list', ['as' => 'permission.list', 'uses' => 'backend\PermissionController@index']);
        Route::delete('/permission-delete/{id}', ['as' => 'permission.delete', 'uses' => 'backend\PermissionController@destroy']);
        Route::get('/permission-edit/{id}', ['as' => 'permission.edit', 'uses' => 'backend\PermissionController@edit']);
        Route::post('/permission-update/{id}', ['as' => 'permission.update', 'uses' => 'backend\PermissionController@update']);


        Route::get('/permission/asign/{id}', ['as' => 'permission.asign', 'uses' => 'backend\PermissionController@asign']);
        Route::post('/permission/permissionasign/{id}', ['as' => 'permission.permissionasign', 'uses' => 'backend\PermissionController@permissionasign']);


        Route::get('/productcategory-create', ['as' => 'productcategory.create', 'uses' => 'backend\ProductcategoryController@create']);
        Route::get('/productcategory-list', ['as' => 'productcategory.list', 'uses' => 'backend\ProductcategoryController@index']);
        Route::post('/productcategory-save', ['as' => 'productcategory.store', 'uses' => 'backend\ProductcategoryController@store']);
        Route::delete('/productcategory-delete/{id}', ['as' => 'productcategory.delete', 'uses' => 'backend\ProductcategoryController@destroy']);
        Route::get('/productcategory-edit/{id}/edit', ['as' => 'productcategory.edit', 'uses' => 'backend\ProductcategoryController@edit']);
        Route::post('/productcategory-update/{id}', ['as' => 'productcategory.update', 'uses' => 'backend\ProductcategoryController@update']);


        Route::get('/product-create', ['as' => 'product.create', 'uses' => 'backend\ProductController@create']);
        Route::get('/product-list', ['as' => 'product.list', 'uses' => 'backend\ProductController@index']);
        Route::post('/product-save', ['as' => 'product.store', 'uses' => 'backend\ProductController@store']);
        Route::delete('/product-delete/{id}', ['as' => 'product.delete', 'uses' => 'backend\ProductController@destroy']);
        Route::get('/product-edit/{id}/edit', ['as' => 'product.edit', 'uses' => 'backend\ProductController@edit']);
        Route::post('/product-update/{id}', ['as' => 'product.update', 'uses' => 'backend\ProductController@update']);
        Route::get('/stock-edit/{id}/edit', ['as' => 'stock.edit', 'uses' => 'backend\ProductController@stockedit']);
        Route::post('/stock-update/{id}', ['as' => 'stock.update', 'uses' => 'backend\ProductController@stockupdate']);

        Route::get('/gst-create', ['as' => 'gst.create', 'uses' => 'backend\ProductController@gstcreate']);
        Route::post('/gst-store', ['as' => 'gst.store', 'uses' => 'backend\ProductController@gststore']);
        Route::get('/gst-list', ['as' => 'gst.list', 'uses' => 'backend\ProductController@gstindex']);
        Route::get('/gst-edit/{id}', ['as' => 'gst.edit', 'uses' => 'backend\ProductController@gstedit']);
        Route::post('/gst-update/{id}', ['as' => 'gst.update', 'uses' => 'backend\ProductController@gstupdate']);
        Route::delete('/gst-delete/{id}', ['as' => 'gst.delete', 'uses' => 'backend\ProductController@gstdestroy']);

        Route::get('/sales-create', ['as' => 'sales.create', 'uses' => 'backend\SalesController@create']);
        Route::post('/sales-store', ['as' => 'sales.store', 'uses' => 'backend\SalesController@store']);
        Route::get('/sales-list', ['as' => 'sales.list', 'uses' => 'backend\SalesController@index']);
        Route::get('/ajaxsales-list', ['as' => 'ajaxsales.list', 'uses' => 'backend\SalesController@ajaxlist']);
        Route::get('/ajax-form', ['as' => 'ajax.form', 'uses' => 'backend\SalesController@ajaxform']);
        Route::get('/refresh-product', ['as' => 'refresh.product', 'uses' => 'backend\SalesController@refreshproduct']);
        Route::get('/sales-allpdf', ['as' => 'sales.printall', 'uses' => 'backend\SalesController@getallpdf']);
        Route::post('/custom-report', ['as' => 'custom.report', 'uses' => 'backend\SalesController@getcustomreport']);
        Route::post('/getquantity', ['as' => 'sales.getquantity', 'uses' => 'backend\SalesController@getquantity']);
        Route::post('/getprice', ['as' => 'sales.getprice', 'uses' => 'backend\SalesController@getprice']);
        Route::post('/savetosales', ['as' => 'save.sales', 'uses' => 'backend\SalesController@savetosales']);
        Route::delete('/delete-salescart/{id}/{pid}', ['as' => 'salescart.delete', 'uses' => 'backend\SalesController@deletecart']);
        Route::post('/gettaxrate', ['as' => 'sales.gettaxrate', 'uses' => 'backend\SalesController@gettaxrate']);

        Route::get('/expenses-create', ['as' => 'expenses.create', 'uses' => 'backend\ExpensesController@create']);
        Route::get('/expenses-list', ['as' => 'expenses.list', 'uses' => 'backend\ExpensesController@index']);
        Route::post('/expenses-save', ['as' => 'expenses.store', 'uses' => 'backend\ExpensesController@store']);
        Route::delete('/expenses-delete/{id}', ['as' => 'expenses.delete', 'uses' => 'backend\ExpensesController@destroy']);
        Route::get('/expenses-edit/{id}/edit', ['as' => 'expenses.edit', 'uses' => 'backend\ExpensesController@edit']);
        Route::post('/expenses-update/{id}', ['as' => 'expenses.update', 'uses' => 'backend\ExpensesController@update']);
        Route::get('/expensesheading-create', ['as' => 'expensesheading.create', 'uses' => 'backend\ExpensesController@expensesheadingcreate']);
        Route::post('/expensesheading-save', ['as' => 'expensesheading.store', 'uses' => 'backend\ExpensesController@expensesheadingstore']);
        Route::get('/expenses-report', ['as' => 'expenses.report', 'uses' => 'backend\ExpensesController@export']);

        Route::get('/setting-create', ['as' => 'invoice.profile.create', 'uses' => 'backend\InvoiceprofileController@index']);
        Route::post('/invoiceprofile/update/{id}', ['as' => 'Settings.invoice.update', 'uses' => 'backend\InvoiceprofileController@update']);


        Route::get('/purchase-create', ['as' => 'purchase.create', 'uses' => 'backend\PurchaseController@create']);
        Route::get('/purchase-list', ['as' => 'purchase.list', 'uses' => 'backend\PurchaseController@index']);
        Route::post('/purchase-save', ['as' => 'purchase.store', 'uses' => 'backend\PurchaseController@store']);
        //Route::delete('/purchase-delete/{id}', ['as' => 'purchase.delete', 'uses' => 'backend\PurchaseController@destroy']);
        //Route::get('/purchase-edit/{id}/edit', ['as' => 'purchase.edit', 'uses' => 'backend\PurchaseController@edit']);
        Route::get('/purchase-update/{id}', ['as' => 'purchase.update', 'uses' => 'backend\PurchaseController@update']);
        Route::post('/purchase-report', ['as' => 'purchase.report', 'uses' => 'backend\PurchaseController@export']);

        Route::get('/transaction-create', ['as' => 'transaction.create', 'uses' => 'backend\TransactionController@create']);
        Route::get('/transaction-list', ['as' => 'transaction.list', 'uses' => 'backend\TransactionController@index']);
        Route::post('/transaction-save', ['as' => 'transaction.store', 'uses' => 'backend\TransactionController@store']);
        Route::get('/transaction-update/{id}', ['as' => 'transaction.update', 'uses' => 'backend\TransactionController@update']);
        Route::get('/transaction-report', ['as' => 'transaction.report', 'uses' => 'backend\TransactionController@export']);

    });
});