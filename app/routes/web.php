<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create-password', function () {
    return view('password_create');
})->name('passwords.create');

Route::post('/password-store', function () {
    return view('password_create');
})->name('passwords.store');

Route::post('/password-store', [PasswordController::class, 'store'])->name('passwords.store'); // exemple de route avec un controller

Route::get('/show-password', function () {
    return view('show_passwords');
})->name('passwords.index');

Route::get('/show-password', [PasswordController::class, 'showPasswords'])->name('passwords.index'); // exemple de route avec un controller

Route::get('/password_modify/{id}',  function ($id) {
    return view('password_modify', ['id' => $id]);
})->name('password.modify'); // exemple de route avec un controller

Route::post('/password_modify/{id}',[PasswordController::class, 'modify'])->name('password.modify');

Route::get('/create-team', function () {
    return view('team_create');
})->name('team.create');

Route::post('/create-team', function () {
    return view('team_create');
})->name('team.store');

Route::post('/create-team', [TeamController::class, 'store'])->name('team.store'); // exemple de route avec un controller

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
