<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\Admin\DataCabangController;
use App\Http\Controllers\Admin\DataDaerahController;
use App\Http\Controllers\Admin\DataKhusuController;
use App\Http\Controllers\Admin\DataStakeholderController;
use App\Http\Controllers\Admin\DataUmumController;
use App\Http\Controllers\Admin\DataWilayahController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JenisIzinController;
use App\Http\Controllers\Admin\JenisKerjasamaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PerizinanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
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

    // Data Khusus
    Route::post('data-khusus/csv', [DataKhusuController::class, 'csvStore'])->name('data-khusus.csv.store');
    Route::put('data-khusus/csv', [DataKhusuController::class, 'csvUpdate'])->name('data-khusus.csv.update');
    Route::resource('data-khusus', DataKhusuController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Daerah
    Route::post('data-daerahs/csv', [DataDaerahController::class, 'csvStore'])->name('data-daerahs.csv.store');
    Route::put('data-daerahs/csv', [DataDaerahController::class, 'csvUpdate'])->name('data-daerahs.csv.update');
    Route::resource('data-daerahs', DataDaerahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Wilayah
    Route::post('data-wilayahs/csv', [DataWilayahController::class, 'csvStore'])->name('data-wilayahs.csv.store');
    Route::put('data-wilayahs/csv', [DataWilayahController::class, 'csvUpdate'])->name('data-wilayahs.csv.update');
    Route::resource('data-wilayahs', DataWilayahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Data Cabang
    Route::post('data-cabangs/csv', [DataCabangController::class, 'csvStore'])->name('data-cabangs.csv.store');
    Route::put('data-cabangs/csv', [DataCabangController::class, 'csvUpdate'])->name('data-cabangs.csv.update');
    Route::resource('data-cabangs', DataCabangController::class, ['except' => ['store', 'update', 'destroy']]);

    // Jenis Kerjasama
    Route::post('jenis-kerjasamas/csv', [JenisKerjasamaController::class, 'csvStore'])->name('jenis-kerjasamas.csv.store');
    Route::put('jenis-kerjasamas/csv', [JenisKerjasamaController::class, 'csvUpdate'])->name('jenis-kerjasamas.csv.update');
    Route::resource('jenis-kerjasamas', JenisKerjasamaController::class, ['except' => ['store', 'update', 'destroy']]);

    // Jenis Izin
    Route::resource('jenis-izins', JenisIzinController::class, ['except' => ['store', 'update', 'destroy']]);

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
