<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

include('admin.php');
Route::get('/clear_cache', function () {

    \Artisan::call('orbscope');

    dd("Cache is cleared");

});
Route::get('/', [Controllers\FrontendController::class, 'Index']);
Route::post('/contact', [Controllers\FrontendController::class, 'contact_us']);
Route::get('/lang/{lang?}', [Controllers\SettingsController::class, 'ChangeLanguage']);
Route::resource('maintenance_form', Controllers\MaintenanceFormController::class)->only([
    'store'
]);




