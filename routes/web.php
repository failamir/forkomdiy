<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\Admin\DataCabangController;
use App\Http\Controllers\Admin\DataDaerahController;
use App\Http\Controllers\Admin\DataRantingController;
use App\Http\Controllers\Admin\DataStakeholderController;
use App\Http\Controllers\Admin\DataUmumController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JenisKerjasamaController;
use App\Http\Controllers\Admin\KetuaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PerizinanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RegencyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes();

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Perizinan
    Route::post('perizinans/media', [PerizinanController::class, 'storeMedia'])->name('perizinans.storeMedia');
    Route::post('perizinans/csv', [PerizinanController::class, 'csvStore'])->name('perizinans.csv.store');
    Route::put('perizinans/csv', [PerizinanController::class, 'csvUpdate'])->name('perizinans.csv.update');
    Route::resource('perizinans', PerizinanController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Stakeholders
    Route::post('data-stakeholders/media', [DataStakeholderController::class, 'storeMedia'])->name('data-stakeholders.storeMedia');
    Route::post('data-stakeholders/csv', [DataStakeholderController::class, 'csvStore'])->name('data-stakeholders.csv.store');
    Route::put('data-stakeholders/csv', [DataStakeholderController::class, 'csvUpdate'])->name('data-stakeholders.csv.update');
    Route::resource('data-stakeholders', DataStakeholderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    Route::resource('system-calendars', SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Contact Company
    Route::resource('contact-companies', ContactCompanyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Contacts
    Route::resource('contact-contacts', ContactContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Umum
    Route::post('data-umums/media', [DataUmumController::class, 'storeMedia'])->name('data-umums.storeMedia');
    Route::post('data-umums/csv', [DataUmumController::class, 'csvStore'])->name('data-umums.csv.store');
    Route::put('data-umums/csv', [DataUmumController::class, 'csvUpdate'])->name('data-umums.csv.update');
    Route::resource('data-umums', DataUmumController::class, ['except' => ['store', 'update', 'destroy']]);

    // Jenis Kerjasama
    Route::post('jenis-kerjasamas/csv', [JenisKerjasamaController::class, 'csvStore'])->name('jenis-kerjasamas.csv.store');
    Route::put('jenis-kerjasamas/csv', [JenisKerjasamaController::class, 'csvUpdate'])->name('jenis-kerjasamas.csv.update');
    Route::resource('jenis-kerjasamas', JenisKerjasamaController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ketua
    Route::post('ketuas/csv', [KetuaController::class, 'csvStore'])->name('ketuas.csv.store');
    Route::put('ketuas/csv', [KetuaController::class, 'csvUpdate'])->name('ketuas.csv.update');
    Route::resource('ketuas', KetuaController::class, ['except' => ['store', 'update', 'destroy']]);

    // Province
    Route::post('provinces/csv', [ProvinceController::class, 'csvStore'])->name('provinces.csv.store');
    Route::put('provinces/csv', [ProvinceController::class, 'csvUpdate'])->name('provinces.csv.update');
    Route::resource('provinces', ProvinceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Regencies
    Route::post('regencies/csv', [RegencyController::class, 'csvStore'])->name('regencies.csv.store');
    Route::put('regencies/csv', [RegencyController::class, 'csvUpdate'])->name('regencies.csv.update');
    Route::resource('regencies', RegencyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Districts
    Route::post('districts/csv', [DistrictController::class, 'csvStore'])->name('districts.csv.store');
    Route::put('districts/csv', [DistrictController::class, 'csvUpdate'])->name('districts.csv.update');
    Route::resource('districts', DistrictController::class, ['except' => ['store', 'update', 'destroy']]);

    // Villages
    Route::post('villages/csv', [VillageController::class, 'csvStore'])->name('villages.csv.store');
    Route::put('villages/csv', [VillageController::class, 'csvUpdate'])->name('villages.csv.update');
    Route::resource('villages', VillageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Daerah
    Route::post('data-daerahs/media', [DataDaerahController::class, 'storeMedia'])->name('data-daerahs.storeMedia');
    Route::post('data-daerahs/csv', [DataDaerahController::class, 'csvStore'])->name('data-daerahs.csv.store');
    Route::put('data-daerahs/csv', [DataDaerahController::class, 'csvUpdate'])->name('data-daerahs.csv.update');
    Route::resource('data-daerahs', DataDaerahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Cabang
    Route::post('data-cabangs/media', [DataCabangController::class, 'storeMedia'])->name('data-cabangs.storeMedia');
    Route::post('data-cabangs/csv', [DataCabangController::class, 'csvStore'])->name('data-cabangs.csv.store');
    Route::put('data-cabangs/csv', [DataCabangController::class, 'csvUpdate'])->name('data-cabangs.csv.update');
    Route::resource('data-cabangs', DataCabangController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Ranting
    Route::post('data-rantings/media', [DataRantingController::class, 'storeMedia'])->name('data-rantings.storeMedia');
    Route::resource('data-rantings', DataRantingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
