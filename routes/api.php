<?php

use App\Http\Controllers\Api\V1\Admin\DataCabangApiController;
use App\Http\Controllers\Api\V1\Admin\DataDaerahApiController;
use App\Http\Controllers\Api\V1\Admin\DataKhusuApiController;
use App\Http\Controllers\Api\V1\Admin\DataStakeholderApiController;
use App\Http\Controllers\Api\V1\Admin\DataUmumApiController;
use App\Http\Controllers\Api\V1\Admin\DataWilayahApiController;
use App\Http\Controllers\Api\V1\Admin\JenisKerjasamaApiController;
use App\Http\Controllers\Api\V1\Admin\PerizinanApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Perizinan
    Route::post('perizinans/media', [PerizinanApiController::class, 'storeMedia'])->name('perizinans.store_media');
    Route::apiResource('perizinans', PerizinanApiController::class);

    // Data Stakeholders
    Route::post('data-stakeholders/media', [DataStakeholderApiController::class, 'storeMedia'])->name('data_stakeholders.store_media');
    Route::apiResource('data-stakeholders', DataStakeholderApiController::class);

    // Data Umum
    Route::post('data-umums/media', [DataUmumApiController::class, 'storeMedia'])->name('data_umums.store_media');
    Route::apiResource('data-umums', DataUmumApiController::class);

    // Data Khusus
    Route::apiResource('data-khusus', DataKhusuApiController::class);

    // Data Daerah
    Route::apiResource('data-daerahs', DataDaerahApiController::class);

    // Data Wilayah
    Route::apiResource('data-wilayahs', DataWilayahApiController::class);

    // Data Cabang
    Route::apiResource('data-cabangs', DataCabangApiController::class);

    // Jenis Kerjasama
    Route::apiResource('jenis-kerjasamas', JenisKerjasamaApiController::class);
});
