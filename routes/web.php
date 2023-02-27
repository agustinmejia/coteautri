<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TelephonyController;

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
Route::get('/', [TemplateController::class, 'index']);
Route::get('register', [TemplateController::class, 'register']);
Route::get('home/search/{search?}', [TemplateController::class, 'list']);

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::resource('resetpassword', ResetPasswordController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post('home/search', [TemplateController::class, 'search'])->name('home.search');
Route::resource('coteautri', TemplateController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'loggin'], function () {
    Voyager::routes();

    Route::resource('telephony', TelephonyController::class);
    Route::get('telephony/ajax/list/{search?}', [TelephonyController::class, 'list']);
    Route::post('telephony/importar', [TelephonyController::class, 'import'])->name('telephony.import');



    Route::get('download/log/{cad?}', [AjaxController::class, 'downloadLg'])->name('download.log');




    // report
    Route::get('print/dowload', [ReportController::class, 'indexDownload'])->name('print.download');
    Route::post('print/dowload/list', [ReportController::class, 'listDownload'])->name('print-download.list');

    Route::get('print/auth', [ReportController::class, 'indexAuth'])->name('print.auth');
    Route::post('print/dowload/list', [ReportController::class, 'listAuth'])->name('print-auth.list');




});

Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');

