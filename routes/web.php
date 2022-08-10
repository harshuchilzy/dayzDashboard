<?php

use App\Http\Controllers\SettingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('users', App\Http\Controllers\Users\UserController::class);
    
    Route::resource('users/permissions', App\Http\Controllers\Users\PermissionController::class);
    Route::resource('users/roles', App\Http\Controllers\Users\RoleController::class);

    Route::get('/dialer', [App\Http\Controllers\Calls\CallController::class, 'dialer'])->name('dialer');

    Route::get('settings', [App\Http\Controllers\SettingController::class, 'settingsPage'])->name('settings');
    Route::post('settings', [App\Http\Controllers\SettingController::class, 'updateSettings'])->name('settings.update');
});

Route::get('create-campaign', function(){
    return inertia()->render('Campaign/Create');
});
