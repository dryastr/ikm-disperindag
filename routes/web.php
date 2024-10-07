<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\manajemen\ComplaintsAdminController;
use App\Http\Controllers\Admin\Manajemen\ComplaintsController;
use App\Http\Controllers\admin\manajemen\IKMDisperindagAdminController;
use App\Http\Controllers\admin\manajemen\IKMDisperindagAdminPendingController;
use App\Http\Controllers\admin\manajemen\IKMRegistrationsController;
use App\Http\Controllers\admin\manajemen\NotificationController;
use App\Http\Controllers\admin\manajemen\UpdateProfileUserController;
use App\Http\Controllers\admin\manajemen\UsersProfileController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role->name === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    }
    return redirect()->route('login');
})->name('home');

Auth::routes(['middleware' => ['redirectIfAuthenticated']]);


Route::middleware(['auth', 'role.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // manajemen
    Route::put('/admin-profile/update', [UpdateProfileUserController::class, 'update'])->name('admin-profile.update');
    Route::resource('lists-ikm', IKMDisperindagAdminController::class);
    Route::resource('lists-pending', IKMDisperindagAdminPendingController::class);
    Route::put('/update-status/{id}', [IKMDisperindagAdminController::class, 'updateStatus'])->name('updateStatus');
    Route::resource('list-complaints', ComplaintsAdminController::class);
    Route::resource('users', UsersProfileController::class)->except(['create', 'show']);
    Route::get('ikm/export/pangan', [IKMDisperindagAdminController::class, 'exportPangan'])->name('ikm.export.pangan');
    Route::get('ikm/export/kerajinan', [IKMDisperindagAdminController::class, 'exportKerajinan'])->name('ikm.export.kerajinan');
    Route::get('ikm/export/aneka', [IKMDisperindagAdminController::class, 'exportAneka'])->name('ikm.export.aneka');
});

Route::middleware(['auth', 'role.user'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');

    // manajemen
    Route::resource('ikm-registrations', IKMRegistrationsController::class);
    Route::resource('complaints', ComplaintsController::class);
    Route::put('/profile/update', [UpdateProfileUserController::class, 'update'])->name('profile.update');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});
