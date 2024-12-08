<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Route to redirect the user to Keycloak for login
Route::get('/login', [AuthController::class, 'redirectToProvider'])->name('login');

// Route to handle the callback from Keycloak after login
Route::get('/auth/callback', [AuthController::class, 'handleProviderCallback']);

// Route to log the user out of the application and Keycloak
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    if (session()->has('user')) {
        $user = session('user');
        return view('welcome', ['user' => $user]);
    }
    return redirect('/login');
})->name('home');
