<?php

use App\Modules\Api\Controllers\CityApiController;
use App\Modules\Api\Controllers\FlatApiController;
use App\Modules\Api\Controllers\FlatTypeApiController;
use App\Modules\Api\Controllers\HoodApiController;
use App\Modules\Api\Controllers\UnitApiController;
use App\Modules\Api\Controllers\UnitTypeApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('units', [UnitApiController::class, 'index']);
    Route::get('units/{unit}', [UnitApiController::class, 'show']);

    Route::get('flats', [FlatApiController::class, 'index']);
    Route::get('flats/{flat}', [FlatApiController::class, 'show']);

    Route::get('hoods', [HoodApiController::class, 'index']);
    Route::get('hoods/{hood}', [HoodApiController::class, 'show']);

    Route::get('flat-types', [FlatTypeApiController::class, 'index']);
    Route::get('flat-types/{flatType}', [FlatTypeApiController::class, 'show']);

    Route::get('unit-types', [UnitTypeApiController::class, 'index']);
    Route::get('unit-types/{unitType}', [UnitTypeApiController::class, 'show']);

    Route::get('cities', [CityApiController::class, 'index']);
    Route::get('cities/{city}', [CityApiController::class, 'show']);
});
