<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Models\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'welcome'])->name('/');
Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/create-password', [PasswordController::class, 'password_create'])->name('passwords.create');
Route::post('/password-store', [PasswordController::class, 'store'])->name('passwords.store');
Route::get('/show-password', [PasswordController::class, 'showPasswords'])->name('passwords.index');
Route::get('/password_modify/{id}', [PasswordController::class, 'showModifyForm'])->name('password.modify');
Route::post('/password_modify/{id}', [PasswordController::class, 'modify'])->name('password.modify');
Route::get('/create-team', [TeamController::class, 'team_create'])->name('team.create');
Route::post('/create-team', [TeamController::class, 'store'])->name('team.store');
Route::get('/show-team', [TeamController::class, 'index'])->name('team.index');
Route::get('/team_invite', [TeamController::class, 'team_invite'])->name('team.invite');
Route::post('/team_invite', [TeamController::class, 'joinTeam'])->name('team.invite');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
