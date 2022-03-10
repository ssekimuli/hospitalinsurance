<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PateintsController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\transactionsController;
use App\Http\Controllers\insurancesController;
use App\Http\Controllers\PolicyServiceController;
use App\Http\Controllers\ServiceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('pateints',App\Http\Controllers\PateintsController::class);
Route::resource('ptInsure',App\Http\Controllers\insurancesController::class);
Route::resource('insure',App\Http\Controllers\CompanyController::class);
Route::resource('policy',App\Http\Controllers\PoliciesController::class);
Route::resource('service',App\Http\Controllers\ServiceController::class);
Route::resource('policyService',App\Http\Controllers\PolicyServiceController::class);
Route::resource('transaction',App\Http\Controllers\transactionsController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
