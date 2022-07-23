<?php

use Illuminate\Support\Facades\Route;

use App\Models\Sign_table;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    $Sign_table = Sign_table::all();
    return view('dashboard',compact('Sign_table'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create/create', [App\Http\Controllers\SignupController::class, 'create'])->name('create.create');
Route::post('/create/login', [App\Http\Controllers\LoginpController::class, 'login'])->name('create.login');
// Route::get('/signup_up/user_dashboard', [App\Http\Controllers\LoginpController::class, 'dashboard'])->name('signup_up.user_dashboard');
Route::get('/auth/logout', [App\Http\Controllers\LoginpController::class, 'logout'])->name('auth.logout');
Auth::routes();

Route::group(['middleware'=>['Authcheck']],function(){
    Route::get('/signup_up/user_dashboard', [App\Http\Controllers\LoginpController::class, 'dashboard'])->name('signup_up.user_dashboard');

    Route::get('/sign_up', [App\Http\Controllers\SignupController::class, 'sign'])->name('sign_up');
    Route::get('/login_user', [App\Http\Controllers\SignupController::class, 'login'])->name('login_user');
});

Route::get('/reset/password', [App\Http\Controllers\ResetController::class, 'reset'])->name('reset.password');
Route::post('/reset/otp', [App\Http\Controllers\ResetController::class, 'rahul_otps'])->name('reset.otp');
Route::post('/confirm/otp_check', [App\Http\Controllers\ResetController::class, 'confirm_submit'])->name('confirm.otp_check');
Route::post('/remove/clear_otp', [App\Http\Controllers\ResetController::class, 'remove_otp'])->name('remove.clear_otp');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
