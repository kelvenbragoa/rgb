<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {

    return view('welcome');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('lang', 'App\Http\Controllers\LanguageController');

Route::group(['middleware'=>['auth','admin']], function(){

    Route::resource('manager', 'App\Http\Controllers\Admin\ManagerController');
    Route::resource('notification', 'App\Http\Controllers\Admin\NotificationController');
    Route::resource('configuration', 'App\Http\Controllers\Admin\ConfigurationController');
    Route::resource('tallyclerk', 'App\Http\Controllers\Admin\TallyClerkController');
    Route::resource('customer', 'App\Http\Controllers\Admin\CustomerController');
    Route::resource('agent', 'App\Http\Controllers\Admin\AgentController');
    Route::resource('shift', 'App\Http\Controllers\Admin\ShiftController');
    Route::resource('merchandise', 'App\Http\Controllers\Admin\TypeMerchandiseController');
    Route::resource('operation', 'App\Http\Controllers\Admin\OperationStationController');
    Route::resource('ship', 'App\Http\Controllers\Admin\ShipController');
    Route::resource('shiftship', 'App\Http\Controllers\Admin\ShiftShipController');
    Route::resource('tallyclerkship','App\Http\Controllers\Admin\TallyClerkShipController');
    Route::resource('shiftship.tallyclerkship','App\Http\Controllers\Admin\TallyClerkShipController');
    Route::resource('basement', 'App\Http\Controllers\Admin\BasementController');
    Route::get('/tallyclerkshiftship/{tallclerkshiftship_id}/ship/{ship_id}', [App\Http\Controllers\Admin\TallyClerkShiftShipController::class, 'index']);
    Route::get('/deleteall-admin',[\App\Http\Controllers\Admin\NotificationController::class,'deleteall']);
    Route::get('/closeoperation/{ship_id}', [App\Http\Controllers\Admin\ShipController::class, 'operation']);
    Route::get('/general-report/{ship_id}', [App\Http\Controllers\Admin\ShipController::class, 'report']);
    Route::get('/shift-report/{ship_id}', [App\Http\Controllers\Admin\ShipController::class, 'shiftreport']);
    Route::get('/basement-report/{ship_id}', [App\Http\Controllers\Admin\ShipController::class, 'basementreport']);

});

Route::group(['middleware'=>['auth','manager']], function(){
    Route::resource('manager-agent', 'App\Http\Controllers\Manager\AgentController');
    Route::resource('manager-merchandise', 'App\Http\Controllers\Manager\TypeMerchandiseController');
    Route::resource('manager-operation', 'App\Http\Controllers\Manager\OperationStationController');
    Route::resource('manager-customer', 'App\Http\Controllers\Manager\CustomerController');
    Route::resource('manager-tallyclerk', 'App\Http\Controllers\Manager\TallyClerkController');
    Route::resource('manager-ship', 'App\Http\Controllers\Manager\ShipController');
    Route::resource('manager-notification', 'App\Http\Controllers\Manager\NotificationController');
    Route::resource('manager-configuration', 'App\Http\Controllers\Manager\ConfigurationController');
    Route::resource('manager-shiftship','App\Http\Controllers\Manager\ShiftShipController');
    Route::resource('manager-tallyclerkship','App\Http\Controllers\Manager\TallyClerkShipController');
    Route::resource('manager-basement', 'App\Http\Controllers\Manager\BasementController');
    Route::resource('manager-shiftship.manager-tallyclerkship','App\Http\Controllers\Manager\TallyClerkShipController');
    Route::get('/manager-tallyclerkshiftship/{tallclerkshiftship_id}/manager-ship/{ship_id}', [App\Http\Controllers\Manager\TallyClerkShiftShipController::class, 'index']);

    Route::resource('manager-stop', 'App\Http\Controllers\Manager\StopController');
    Route::get('/deleteall-manager',[\App\Http\Controllers\Manager\NotificationController::class,'deleteall']);
    Route::get('/manager-closeoperation/{ship_id}', [App\Http\Controllers\Manager\ShipController::class, 'operation']);
    Route::get('/manager-general-report/{ship_id}', [App\Http\Controllers\Manager\ShipController::class, 'report']);
    Route::get('/manager-shift-report/{ship_id}', [App\Http\Controllers\Manager\ShipController::class, 'shiftreport']);
    Route::get('/manager-basement-report/{ship_id}', [App\Http\Controllers\Manager\ShipController::class, 'basementreport']);

});

Route::group(['middleware'=>['auth','tallyclerk']], function(){

    Route::resource('tallyclerk-notification', 'App\Http\Controllers\TallyClerk\NotificationController');
    Route::resource('tallyclerk-configuration', 'App\Http\Controllers\TallyClerk\ConfigurationController');
    Route::resource('tallyclerk-ship', 'App\Http\Controllers\TallyClerk\ShipController');
    Route::resource('tallyclerk-shift', 'App\Http\Controllers\TallyClerk\ShiftController');
    Route::resource('tallyclerk-tallybook', 'App\Http\Controllers\TallyClerk\TallyBookController');
    Route::resource('tallyclerk-stop', 'App\Http\Controllers\TallyClerk\StopController');
    Route::get('/deleteall-tallyclerk',[\App\Http\Controllers\TallyClerk\NotificationController::class,'deleteall']);
    
    
});

Route::group(['middleware'=>['auth','customer']], function(){

    Route::resource('customer-notification', 'App\Http\Controllers\Customer\NotificationController');
    Route::resource('customer-configuration', 'App\Http\Controllers\Customer\ConfigurationController');
    Route::get('/deleteall-customer',[\App\Http\Controllers\Customer\NotificationController::class,'deleteall']);
    Route::resource('customer-ship', 'App\Http\Controllers\Customer\ShipController');
    Route::resource('customer-basement', 'App\Http\Controllers\Customer\BasementController');
    Route::resource('customer-shiftship','App\Http\Controllers\Customer\ShiftShipController');
    Route::resource('customer-tallyclerkship','App\Http\Controllers\Customer\TallyClerkShipController');
    Route::get('/customer-tallyclerkshiftship/{tallclerkshiftship_id}/customer-ship/{ship_id}', [App\Http\Controllers\Customer\TallyClerkShiftShipController::class, 'index']);
    Route::resource('customer-shiftship.customer-tallyclerkship','App\Http\Controllers\Customer\TallyClerkShipController');
    Route::get('/customer-closeoperation/{ship_id}', [App\Http\Controllers\Customer\ShipController::class, 'operation']);
    Route::get('/customer-general-report/{ship_id}', [App\Http\Controllers\Customer\ShipController::class, 'report']);
    Route::get('/customer-shift-report/{ship_id}', [App\Http\Controllers\Customer\ShipController::class, 'shiftreport']);
    Route::get('/customer-basement-report/{ship_id}', [App\Http\Controllers\Customer\ShipController::class, 'basementreport']);


});

Route::group(['middleware'=>['auth','agent']], function(){

    Route::resource('agent-notification', 'App\Http\Controllers\Agent\NotificationController');
    Route::resource('agent-configuration', 'App\Http\Controllers\Agent\ConfigurationController');
    Route::get('/deleteall-agent',[\App\Http\Controllers\Agent\NotificationController::class,'deleteall']);
    Route::resource('agent-ship', 'App\Http\Controllers\Agent\ShipController');
    Route::resource('agent-basement', 'App\Http\Controllers\Agent\BasementController');
    Route::resource('agent-shiftship','App\Http\Controllers\Agent\ShiftShipController');
    Route::resource('agent-tallyclerkship','App\Http\Controllers\Agent\TallyClerkShipController');
    Route::get('/agent-tallyclerkshiftship/{tallclerkshiftship_id}/agent-ship/{ship_id}', [App\Http\Controllers\Agent\TallyClerkShiftShipController::class, 'index']);
    Route::resource('agent-shiftship.agent-tallyclerkship','App\Http\Controllers\Agent\TallyClerkShipController');
    Route::get('/agent-closeoperation/{ship_id}', [App\Http\Controllers\Agent\ShipController::class, 'operation']);
    Route::get('/agent-general-report/{ship_id}', [App\Http\Controllers\Agent\ShipController::class, 'report']);
    Route::get('/agent-shift-report/{ship_id}', [App\Http\Controllers\Agent\ShipController::class, 'shiftreport']);
    Route::get('/agent-basement-report/{ship_id}', [App\Http\Controllers\Agent\ShipController::class, 'basementreport']);


});


