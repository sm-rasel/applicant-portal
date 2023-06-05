<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use Illuminate\Http\Request;

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
// Route::get('/list', function () {
//    return view('welcome');
// });
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

});
Route::group([], function () {
    Route::get('/list', [ApplicantController::class, 'applicantIndex'])->name('app_index');
    Route::post('/applicant-store', [ApplicantController::class, 'applicantStore'])->name('app_add');
    Route::post('/applicant-edit/{id}', [ApplicantController::class, 'applicantEdit'])->name('app_update');
    Route::delete('/applicant-delete/{id}', [ApplicantController::class, 'applicantDelete'])->name('app_delete');
});
