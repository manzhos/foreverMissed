<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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
    return view('invite');
});

Route::get('/api/getuserroles', [UserController::class, 'getRoles'])->name('getuserroles');
Route::post('/api/sendmail', [MailController::class, 'sendMail'])->name('sendmail');
