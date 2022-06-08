<?php

use App\Http\Controllers\BscsController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\ExcelController;
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
    return view('connexion');
});

 


Route::post('check', [UserController::class, 'check'])->name('check');
Route::post('store', [UserController::class, 'store'])->name('store'); 

 
Route::group(['middleware' => ['logged']], function () {
    Route::get('index',  [UserController::class, 'index']); 
    Route::get('logout', [UserController::class, 'logout']);
 
    Route::get('fiche_pdf/{invoice}', [InvoiceController::class, 'pdf']);
    Route::get('getFiles', [InvoiceController::class, 'create']);
    Route::get('export', [InvoiceController::class, 'export']);

    Route::post('invoicestore', [InvoiceController::class, 'store']);
    Route::post('deleteInvoices', [InvoiceController::class, 'deleteInvoices']);

    Route::get('bscs',  [BscsController::class, 'index']);  
    Route::get('upload_bscs', [BscsController::class, 'create']);
    Route::post('bscsstore', [BscsController::class, 'store']);
    Route::post('deleteBscs', [BscsController::class, 'deleteBscs']);

    

});