<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SinglentonController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\Logger;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/user', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'create'])->middleware(CheckSalary::class);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/paginate', [UserController::class, 'paginate']);
Route::delete('/user/{id}', [UserController::class, 'delete']);

Route::get('/history', [HistoryController::class, 'index']);
Route::post('/history', [HistoryController::class, 'create']);
Route::delete('/history/{id}', [HistoryController::class, 'delete']);


Route::post('/job', function () {
    Logger::dispatch(1);
    //Logger::dispatchAfterResponse(1);
    //Logger::dispatch()->onConnection('sync');
    //Logger::dispatch(1)->onQueue(('secondary'));
    return response()->json(['message' => 'Job dispatched']);
});

Route::get('callAPI',[SinglentonController::class,'callAPI']);