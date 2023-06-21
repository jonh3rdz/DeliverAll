<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\ReservationController as ReservationV1;
use App\Http\Controllers\API\V1\CustomerController as CustomerV1;
use App\Http\Controllers\API\V1\RouterController as RouterV1;
use App\Http\Controllers\API\V1\RouteController as RouteV1;
use App\Http\Controllers\API\V1\VehicleController as VehicleV1;
use App\Http\Controllers\API\V1\RateController as RateV1;
use App\Http\Controllers\API\V1\PackageController as PackageV1;
use App\Http\Controllers\API\V1\TrackingController as TrackingV1;
use App\Http\Controllers\API\V1\NotificationController as NotificationV1;
use App\Http\Controllers\API\V1\RatingController as RatingV1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    // Routes customers
    Route::get('customers', [CustomerV1::class, 'index']);
    Route::get('search/customers/{field}/{query}', [CustomerV1::class, 'search']);
    Route::post('customers', [CustomerV1::class, 'store']);
    Route::get('customers/{idCustomer}', [CustomerV1::class, 'show']);
    Route::put('customers/{idCustomer}', [CustomerV1::class, 'update']);
    Route::delete('customers/{idCustomer}', [CustomerV1::class, 'destroy']);

    // Routes routers
    Route::get('routers', [RouterV1::class, 'index']);
    Route::get('search/routers/{field}/{query}', [RouterV1::class, 'search']);
    Route::post('routers', [RouterV1::class, 'store']);
    Route::get('routers/{idRouter}', [RouterV1::class, 'show']);
    Route::put('routers/{idRouter}', [RouterV1::class, 'update']);
    Route::delete('routers/{idRouter}', [RouterV1::class, 'destroy']);

    // Routes routes
    Route::get('routes', [RouteV1::class, 'index']);
    Route::get('search/routes/{field}/{query}', [RouteV1::class, 'search']);
    Route::post('routes', [RouteV1::class, 'store']);
    Route::get('routes/{idRoute}', [RouteV1::class, 'show']);
    Route::put('routes/{idRoute}', [RouteV1::class, 'update']);
    Route::delete('routes/{idRoute}', [RouteV1::class, 'destroy']);

    // Routes vehicles
    Route::get('vehicles', [VehicleV1::class, 'index']);
    Route::get('search/vehicles/{field}/{query}', [VehicleV1::class, 'search']);
    Route::post('vehicles', [VehicleV1::class, 'store']);
    Route::get('vehicles/{idVehicle}', [VehicleV1::class, 'show']);
    Route::put('vehicles/{idVehicle}', [VehicleV1::class, 'update']);
    Route::delete('vehicles/{idVehicle}', [VehicleV1::class, 'destroy']);

    // Routes rates
    Route::get('rates', [RateV1::class, 'index']);
    Route::get('search/rates/{field}/{query}', [RateV1::class, 'search']);
    Route::post('rates', [RateV1::class, 'store']);
    Route::get('rates/{idRate}', [RateV1::class, 'show']);
    Route::put('rates/{idRate}', [RateV1::class, 'update']);
    Route::delete('rates/{idRate}', [RateV1::class, 'destroy']);

    // Routes packages
    Route::get('packages', [PackageV1::class, 'index']);
    Route::get('search/packages/{field}/{query}', [PackageV1::class, 'search']);
    Route::post('packages', [PackageV1::class, 'store']);
    Route::get('packages/{idPackage}', [PackageV1::class, 'show']);
    Route::put('packages/{idPackage}', [PackageV1::class, 'update']);
    Route::delete('packages/{idPackage}', [PackageV1::class, 'destroy']);

    // Routes tracking
    Route::get('tracking', [TrackingV1::class, 'index']);
    Route::get('search/tracking/{field}/{query}', [TrackingV1::class, 'search']);
    Route::post('tracking', [TrackingV1::class, 'store']);
    Route::get('tracking/{idTracking}', [TrackingV1::class, 'show']);
    Route::put('tracking/{idTracking}', [TrackingV1::class, 'update']);
    Route::delete('tracking/{idTracking}', [TrackingV1::class, 'destroy']);

    // Routes notifications
    Route::get('notifications', [NotificationV1::class, 'index']);
    Route::get('search/notifications/{field}/{query}', [NotificationV1::class, 'search']);
    Route::post('notifications', [NotificationV1::class, 'store']);
    Route::get('notifications/{idNotification}', [NotificationV1::class, 'show']);
    Route::put('notifications/{idNotification}', [NotificationV1::class, 'update']);
    Route::delete('notifications/{idNotification}', [NotificationV1::class, 'destroy']);

    // Routes ratings
    Route::get('ratings', [RatingV1::class, 'index']);
    Route::get('search/ratings/{field}/{query}', [RatingV1::class, 'search']);
    Route::post('ratings', [RatingV1::class, 'store']);
    Route::get('ratings/{idRating}', [RatingV1::class, 'show']);
    Route::put('ratings/{idRating}', [RatingV1::class, 'update']);
    Route::delete('ratings/{idRating}', [RatingV1::class, 'destroy']);
});
