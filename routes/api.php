<?php

use App\Http\Controllers\Api\V1\Admin\DataCabangApiController;
use App\Http\Controllers\Api\V1\Admin\DataDaerahApiController;
use App\Http\Controllers\Api\V1\Admin\DataStakeholderApiController;
use App\Http\Controllers\Api\V1\Admin\DataUmumApiController;
use App\Http\Controllers\Api\V1\Admin\DistrictApiController;
use App\Http\Controllers\Api\V1\Admin\JenisKerjasamaApiController;
use App\Http\Controllers\Api\V1\Admin\KetuaApiController;
use App\Http\Controllers\Api\V1\Admin\PerizinanApiController;
use App\Http\Controllers\Api\V1\Admin\ProvinceApiController;
use App\Http\Controllers\Api\V1\Admin\VillageApiController;

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

    // Jenis Kerjasama
    Route::apiResource('jenis-kerjasamas', JenisKerjasamaApiController::class);

    // Ketua
    Route::apiResource('ketuas', KetuaApiController::class);

    // Province
    Route::apiResource('provinces', ProvinceApiController::class);

    // Districts
    Route::apiResource('districts', DistrictApiController::class);

    // Villages
    Route::apiResource('villages', VillageApiController::class);

    // Data Daerah
    Route::post('data-daerahs/media', [DataDaerahApiController::class, 'storeMedia'])->name('data_daerahs.store_media');
    Route::apiResource('data-daerahs', DataDaerahApiController::class);

    // Data Cabang
    Route::post('data-cabangs/media', [DataCabangApiController::class, 'storeMedia'])->name('data_cabangs.store_media');
    Route::apiResource('data-cabangs', DataCabangApiController::class);
});
