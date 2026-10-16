<?php

use App\Http\Controllers;
    Route::get(GetSettings()->admin_path.'/lang/{lang?}', [Controllers\SettingsController::class, 'ChangeLanguage']);
    Route::get(GetSettings()->admin_path.'/login', [Controllers\AdminController::class, 'Login']);
    Route::post(GetSettings()->admin_path.'/login', [Controllers\AdminController::class, 'Login_Request']);
    Route::get(GetSettings()->admin_path.'/forget-password', [Controllers\AdminController::class, 'Forget_Password']);
    Route::get(GetSettings()->admin_path.'/logout', [Controllers\AdminController::class, 'Logout']);

    // Define Route Group Of admin
    Route::group(['middleware'=>['admin','timeout'],'prefix'=>GetSettings()->admin_path],function(){

        Route::get('/', [Controllers\AdminController::class, 'Index'])->name('adminhomepage');
        Route::get('/contact_users', [Controllers\AdminController::class, 'contact_users']);
        Route::get('/usersContact/search', [Controllers\AdminController::class, 'get_users']);
        Route::post('send/sms', [Controllers\AdminController::class, 'send_sms']);
        //Logs Routes
        Route::post('logs/multi_delete', [Controllers\LogsController::class, 'multi_delete']);
        Route::get('logs/{id}/recover', [Controllers\LogsController::class, 'recover']);
        Route::resource('logs',Controllers\LogsController::class);

        // settings
        Route::get('settings', [Controllers\LogsController::class, 'settings_show']);
        Route::get('delete_trach/{type}/{id}', [Controllers\LogsController::class, 'delete_trach']);
        Route::get('restore_trach/{type}/{id}', [Controllers\LogsController::class, 'restore_trach']);
        Route::get('trached', [Controllers\LogsController::class, 'trached']);

        Route::get('ghangepass', [Controllers\LogsController::class, 'ghange_pass']);
        Route::get('profile', [Controllers\LogsController::class, 'profile']);
        Route::post('ghange_pass', [Controllers\LogsController::class, 'store_pass']);
        Route::post('settings', [Controllers\LogsController::class, 'settings_update'])->name('settings.edit');




        Route::post('users/multi_delete', [Controllers\UsersController::class, 'multi_delete']);
        Route::get('user/{id}/{status}', [Controllers\UsersController::class, 'user_status']);

        Route::resource('users', Controllers\UsersController::class);


        Route::post('hoods/multi_delete', [Controllers\HoodController::class, 'multi_delete']);
        Route::post('units/city/ajax', [Controllers\HoodController::class, 'hood_ajax']);
        Route::post('upload_hoods', [Controllers\HoodController::class, 'upload_hoods']);
        Route::get('upload_hoods', [Controllers\HoodController::class, 'uploadexcel']);
        Route::resource('hoods', Controllers\HoodController::class);

        Route::post('flat_type/multi_delete', [Controllers\FlatTypeController::class, 'multi_delete']);
        Route::resource('flat_type', Controllers\FlatTypeController::class);

        //services
        Route::post('services/multi_delete', [Controllers\ServicesController::class, 'multi_delete']);
        Route::resource('services', Controllers\ServicesController::class);


        // Cities Routes
        Route::post('cities/multi_delete', [Controllers\CitiesController::class, 'multi_delete']);
        Route::resource('cities', Controllers\CitiesController::class);


        // Unit Types Routes
        Route::post('unitTypes/multi_delete', [Controllers\UnitTypesController::class, 'multi_delete']);
        Route::resource('unitTypes', Controllers\UnitTypesController::class);
        // invoicetype Routes
        Route::post('invoicetype/multi_delete', [Controllers\InvoiceTypeController::class, 'multi_delete']);
        Route::resource('invoicetype', Controllers\InvoiceTypeController::class);

       // Units
        Route::post('units/multi_delete', [Controllers\UnitsController::class, 'multi_delete']);
        Route::post('units/add_flats', [Controllers\UnitsController::class, 'add_flats']);
        Route::post('units/add_service', [Controllers\UnitsController::class, 'add_service']);
        Route::get('units/{id}/lease_contracts', [Controllers\UnitsController::class, 'lease_contracts']);
        Route::post('units/add/new_flat', [Controllers\UnitsController::class, 'new_flat_line']);
        Route::get('advanced_search', [Controllers\UnitsController::class, 'advanced_search']);
        Route::post('advanced_ajax', [Controllers\UnitsController::class, 'hood_ajax']);

        Route::get('upload/units', [Controllers\UnitsController::class, 'upload_units']);
        Route::get('units/{id}/service_contracts', [Controllers\UnitsController::class, 'service_contracts']);

        Route::get('upload/apartments', [Controllers\UnitsController::class, 'upload_apartments']);
        Route::post('units/upload/importExcel', [Controllers\UnitsController::class, 'importExcel']);
        Route::post('apartments/upload/importExcel', [Controllers\UnitsController::class, 'apartmentsExcel']);
        Route::resource('units', Controllers\UnitsController::class);


        Route::resource('service_contracts', Controllers\ServiceContractsController::class);

        //flats
        Route::get('units/{id}/add_flat', [Controllers\FlatsController::class, 'add_flat']);
        Route::get('units/{id}/flats', [Controllers\FlatsController::class, 'show_flats']);
        Route::post('flats/multi_edit/{id}', [Controllers\FlatsController::class, 'multi_edit']);
        Route::post('update/multi_edit', [Controllers\FlatsController::class, 'update_multi_edit']);
        Route::resource('flats', Controllers\FlatsController::class);
        //agreements
        Route::get('units/{id}/agreements', [Controllers\AgreementsController::class, 'units_agreements']);
        Route::resource('agreements', Controllers\AgreementsController::class);
        //money_transfers/ajax
        Route::post('money_transfers/ajax', [Controllers\TransferController::class, 'money_transfers_ajax']);
        Route::resource('money_transfers', Controllers\TransferController::class);

        //contracts
        //Route::get('units/{id}/agreements', [\App\Controllers\AgreementsController::class, 'units_agreements']);
        Route::post('/units/ajax', [Controllers\ContractsController::class, 'units_ajax']);
        Route::get('contracts/search', [Controllers\ContractsController::class, 'advanced_search']);
        Route::get('renew/{id}', [Controllers\ContractsController::class, 'renew_contract']);
        Route::post('/garage/ajax', [Controllers\ContractsController::class, 'garage_ajax']);
        Route::post('/get/rent_end/date', [Controllers\ContractsController::class, 'rent_end']);
        Route::post('units/all_types/rents', [Controllers\ContractsController::class, 'flats_all']);
        Route::get('contract/{id}/pdf', [Controllers\ContractsController::class, 'multi_pdf']);
        Route::get('checks/{id}/edit', [Controllers\ContractsController::class, 'edit_check']);
        Route::get('checks/{id}/delete', [Controllers\ContractsController::class, 'delete_check']);
        Route::post('check_edit/{id}', [Controllers\ContractsController::class, 'edit_check_save']);
        Route::resource('contracts', Controllers\ContractsController::class);

        Route::post('customer/multi_delete', [Controllers\CustomerController::class, 'multi_delete']);
        Route::get('upload/customer', [Controllers\CustomerController::class, 'upload_customer']);
        Route::post('upload_users', [Controllers\CustomerController::class, 'upload_users']);
        Route::get('customer/search', [Controllers\CustomerController::class, 'advanced_search']);
        Route::post('add_bankacount', [Controllers\CustomerController::class, 'add_bankacount']);
        Route::resource('customer', Controllers\CustomerController::class);

        Route::get('report/unit', [Controllers\ReportController::class, 'show_unit']);
        Route::get('comprehensive_report', [Controllers\ReportController::class, 'comprehensive_report']);
        Route::get('withdrawal/report', [Controllers\ReportController::class, 'withdrawal_report']);
        Route::get('orders/report', [Controllers\ReportController::class, 'orders_report']);
        Route::get('checks/reports', [Controllers\ReportController::class, 'checks_report']);
        Route::post('checks_flats_tents', [Controllers\ReportController::class, 'checks_flats_tents']);
        Route::post('checks_ajax', [Controllers\ReportController::class, 'checks_ajax']);
        Route::get('checks_reports/show', [Controllers\ReportController::class, 'checks_show']);
        Route::resource('reports', Controllers\ReportController::class);
        Route::get('units/{id}/deportation', [Controllers\ReportController::class, 'deportation']);
        Route::get('financial_report', [Controllers\ReportController::class, 'financial_report']);
        Route::get('financial_report/show', [Controllers\ReportController::class, 'financial_show']);
        Route::post('save/deportation', [Controllers\ReportController::class, 'save_deportation']);
        Route::get('deportation/archives/{id}', [Controllers\ReportController::class, 'deportation_archives']);
        Route::get('deportation/report/{id}', [Controllers\ReportController::class, 'get_deportation_report']);

        //orders
        Route::post('orders/ajax', [Controllers\OrdersController::class, 'units_ajax']);
        Route::get('follow_up', [Controllers\OrdersController::class, 'follow_up']);
        Route::resource('orders', Controllers\OrdersController::class);
         //invoice
        Route::post('invoice/ajax', [Controllers\InvoiceController::class, 'units_ajax']);
        Route::post('add_new_chekline', [Controllers\InvoiceController::class, 'add_new_chekline']);
        Route::get('invoice/{id}/print', [Controllers\InvoiceController::class, 'get_print']);
        Route::get('rent_invoice/{id}/print', [Controllers\InvoiceController::class, 'rent_invo_print']);
        Route::get('invoice/{id}/pdf', [Controllers\InvoiceController::class, 'createPDF']);
        Route::get('payment/{id}/{type}', [Controllers\InvoiceController::class, 'make_payment']);
        Route::get('payments', [Controllers\InvoiceController::class, 'payments']);
        Route::post('pay/{id}/delete', [Controllers\InvoiceController::class, 'payment_delete']);
        Route::get('payment_show/{id}', [Controllers\InvoiceController::class, 'payment_show']);
        Route::get('payment/delete/{id}', [Controllers\InvoiceController::class, 'payment_delete']);
        Route::resource('invoice', Controllers\InvoiceController::class);


        Route::post('order_type/multi_delete', [Controllers\ShopController::class, 'multi_delete']);
        Route::resource('order_type', Controllers\ShopController::class);


        Route::post('maintenance_form/multi_delete', [Controllers\MaintenanceFormController::class, 'multi_delete']);
        Route::get('maintenance_form/{id}/show', [Controllers\MaintenanceFormController::class, 'show']);
        Route::resource('maintenance_form', Controllers\MaintenanceFormController::class)->only([
            'show','index','destroy'
        ]);

        Route::resource('roles', Controllers\RoleController::class);
        Route::resource('permissions', Controllers\PermissionController::class);



    });


