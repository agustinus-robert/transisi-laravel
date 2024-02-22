<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/company/select', [App\Http\Controllers\Select2::class, 'getCompany']);

Route::get('print-company', [App\Http\Controllers\ExportCompanyController::class, 'getData']);
Route::get('print-employee', [App\Http\Controllers\ExportEmployeeController::class, 'getData']);

Route::post('/import-excel-company', [App\Http\Controllers\ExcelImportCompanyController::class, 'import']);
Route::post('/import-excel-employee', [App\Http\Controllers\ExcelImportEmployeeController::class, 'import']);

Route::resources([
    'company' => CompanyController::class,
    'employess' => EmployeeController::class,
]);