<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TelephonyController;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

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
Route::get('register', [TemplateController::class, 'register']);
Route::get('home/search/{search?}', [TemplateController::class, 'list']);

Route::get('login', function () {
    return redirect('admin/login');
});

Route::get('policies-privacy', function () {
    return view('policies-privacy');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver(request('social'))->redirect();
});
 
Route::get('/auth/callback/facebook', function () {
    $facebookUser = Socialite::driver('facebook')->stateless()->user();
    $user = User::updateOrCreate([
        'email' => $facebookUser->email,
    ], [
        'facebook_id' => $facebookUser->id,
        'name' => $facebookUser->name,
        'avatar' => $facebookUser->avatar ?? 'users/default.png',
        'password' => Hash::make($facebookUser->id)
    ]);
    Auth::login($user);
    return redirect('/admin');
});

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();
    $user = User::updateOrCreate([
        'email' => $googleUser->email,
    ], [
        'google_id' => $googleUser->id,
        'name' => $googleUser->name,
        'avatar' => $googleUser->avatar ?? 'users/default.png',
        'password' => Hash::make($googleUser->id)
    ]);
    Auth::login($user);
    return redirect('/admin');
});

Route::get('/', [TemplateController::class, 'index']);


Route::resource('resetpassword', ResetPasswordController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post('home/search', [TemplateController::class, 'search'])->name('home.search');
Route::resource('coteautri', TemplateController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'loggin'], function () {
    Voyager::routes();

    Route::get('guia', [Controller::class, 'guia'])->name('guia.index');

    Route::resource('telephony', TelephonyController::class);
    Route::get('telephony/ajax/list/{search?}', [TelephonyController::class, 'list']);
    Route::post('telephony/importar', [TelephonyController::class, 'import'])->name('telephony.import');

    // Route::resource('debtor', DebtorController::class);
    Route::get('debtors', [DebtorController::class, 'index'])->name('voyager.debtors.index');
    Route::get('debtor/ajax/list/{search?}', [DebtorController::class, 'list']);
    Route::post('debtor/importar', [DebtorController::class, 'import'])->name('debtor.import');
    Route::post('debtor/exportar', [DebtorController::class, 'exportar'])->name('debtor.export');
    Route::post('debtor/store', [DebtorController::class, 'store'])->name('debtor.store');
    Route::post('debtor/destroy', [DebtorController::class, 'destroy'])->name('debtor.delete');

    //para ver el detalle de cada mes de los usuarios o socio
    Route::get('debtor/ajax/detalle/{code}/{mes}/{ano?}', [DebtorController::class, 'detalle'])->name('debtor-ajax.detalle');

    Route::get('download/log/{cad?}', [AjaxController::class, 'downloadLg'])->name('download.log');

    // report
    Route::get('print/download', [ReportController::class, 'indexDownload'])->name('print.download');
    Route::post('print/download/list', [ReportController::class, 'listDownload'])->name('print-download.list');

    Route::get('print/auth', [ReportController::class, 'indexAuth'])->name('print.auth');
    Route::post('print/auth/list', [ReportController::class, 'listAuth'])->name('print-auth.list');

    Route::post('index/image', [Controller::class, 'indexImage'])->name('index.image');
    Route::get('index/image/delete/{id?}', [Controller::class, 'deleteImage'])->name('delete.image');

    Route::post('index/pdf', [Controller::class, 'indexpdf'])->name('index.pdf');
    Route::get('index/pdf/delete/{id?}', [Controller::class, 'deletepdf'])->name('delete.pdf');
});

Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');

