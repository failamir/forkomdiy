<?php

use App\Http\Controllers\Api\V1\Admin\DataStakeholderApiController;
use App\Http\Controllers\Api\V1\Admin\PerizinanApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Perizinan
    Route::post('perizinans/media', [PerizinanApiController::class, 'storeMedia'])->name('perizinans.store_media');
    Route::apiResource('perizinans', PerizinanApiController::class);

    // Data Stakeholders
    Route::post('data-stakeholders/media', [DataStakeholderApiController::class, 'storeMedia'])->name('data_stakeholders.store_media');
    Route::apiResource('data-stakeholders', DataStakeholderApiController::class);
});
