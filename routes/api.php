<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BudgetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'auth:sanctum'

], function($router){

    /*
    |-------------------------------------------------
    | Get data from back end to front end for display
    |-------------------------------------------------
    */
    Route::post('budget/lists', [BudgetController::class, 'index']);

    /*
    |-------------------------
    | BM Store Route
    | ------------------------
    |
    | Store data via api in the bm's table
    |
    */
    Route::post('budget/store', [BudgetController::class, 'store']);

});










