<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadFormController;
use App\Http\Controllers\Api\AuthLoginController;
use App\Http\Controllers\Api\VisitController;
use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\UserVisitDetailsController;
use App\Http\Controllers\Api\LeadController;

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
// API routes created by Puja on date 27-09-2025
Route::post('/sign-in', [AuthLoginController::class, 'sign_in']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
// API routes created by Puja on date 27-09-2025
    Route::post('/visits/checkin', [VisitController::class, 'checkin']);
    Route::get('/visits/checkinId/{id}', [VisitController::class, 'checkinId']);
    Route::post('/visits/checkout/{id}', [VisitController::class, 'checkout']);
    Route::get('/visits/checkinout/history/{id}', [VisitController::class, 'checkInOutHistory']);
    Route::post('/location/log', [LogController::class, 'store']);
    Route::get('/location/journey', [LogController::class, 'index']);
    Route::get('/location/live/{id?}', [LogController::class, 'live_logs']);

// API routes created by Puja on date 04-10-2025
    Route::post('/visits/details', [UserVisitDetailsController::class, 'store']);
    Route::get('/visits/details/history/{id}', [UserVisitDetailsController::class, 'getVisitHistory']);

    Route::get('/lead/status', [LeadController::class, 'getLeadStatus']);
    Route::get('/lead/source/{id}', [LeadController::class, 'getLeadSource']);
    Route::get('/assignlead/{id}', [LeadController::class, 'index']);
    Route::post('/lead', [LeadController::class, 'store']);
    Route::get('/lead/total/{id}', [LeadController::class, 'getLeadTotal']);
    Route::get('/lead/{id}', [LeadController::class, 'allLeads']);
});
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//
//    return $request->user();
//});
// Lead Form API Routes
Route::post('/leads/form', [LeadFormController::class, 'store']);

// Create Lead with Fixed Token Authentication by puja on date 15-10-2025
Route::post('/leads/create', [LeadController::class, 'createWithToken'])->middleware('fixed.api.token');

