<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ModificationController;
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


/*front office*/
Route::get('/Fdelete/{id}' , 'App\Http\Controllers\FController@Fdelete');
Route::post('/Fupdate-ticket/{id}', 'App\Http\Controllers\FController@updateTicket')->name('Fupdate-ticket');
Route::post('/search', [FController::class, 'search'])->name('search');
Route::get('/FMenu', function () {
    return view('FrontOffice/FMenu');
});
Route::get('/Flisteticket', 'App\Http\Controllers\FController@liste');
Route::post('/envoyer-email', 'App\Http\Controllers\FController@envoyerEmail')->name('envoyer-email');
Route::get('/Faddticket', function () {
    return view('FrontOffice/Faddticket');
});
Route::get('/Fdashboard', 'App\Http\Controllers\FController@st')->name('Fdashboard');
Route::get('/Fupdateapp/{id}','App\Http\Controllers\FController@FshowUpdateForm')->name('FshowUpdateForm');
/*Middle office*/
Route::get('/Mlisteticket', 'App\Http\Controllers\MController@liste');
Route::get('/Mlisteapp', 'App\Http\Controllers\MController@listeapp');
Route::get('/Mupdateapp', function () {
    return view('MiddleOffice/Mupdateapp');
});
Route::get('/Maddapp', function () {
    return view('MiddleOffice/Maddapp');
});
Route::get('/Mdeleteapp/{id}' ,'App\Http\Controllers\MController@Mdeleteapp');
Route::get('/Mupdateapp/{id}','App\Http\Controllers\MController@MshowUpdateForm')->name('MshowUpdateForm');
Route::post('/Mupdateapp/{id}', 'App\Http\Controllers\MController@updateData')->name('updateData');
Route::post('/Maddapp','App\Http\Controllers\MController@application')->name('application');
Route::get('/MAsearch', 'App\Http\Controllers\MController@MAsearch')->name('MAsearch');
Route::get('/MTsearch', 'App\Http\Controllers\MController@MTsearch')->name('MTsearch');
Route::get('/Mdashboard', 'App\Http\Controllers\MController@st')->name('Mdashboard');


/*Back office*/
Route::get('/Bdashboard', 'App\Http\Controllers\UserController@st')->name('Bdashboard');
Route::post('/updateStatut/{id}', 'App\Http\Controllers\UserController@updateStatut')->name('updateStatut');
Route::get('/Blisteticket', 'App\Http\Controllers\UserController@liste');
Route::get('/Bsearch', 'App\Http\Controllers\UserController@Bsearch')->name('Bsearch');






Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('Register');
});


Route::get('/listeticket', function () {
    return view('listeticket');
});

//Route::get('/dashboard', [UserController::class, 'displayData'])->name('dashboard');

Route::post('/register', [UserController::class, 'register']);
Route::post('/', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');





Route::get('/listeticket', 'App\Http\Controllers\UserController@liste');

Route::get('/Menu', function () {
    return view('Menu');
});







Route::get('/delete/{id}' , [UserController::class , 'delete']);


Route::get('/test', function () {
    return view('test');
});
Route::get('/update', function () {
    return view('update');
});




Route::post('/update-ticket/{id}', [UserController::class, 'updateTicket'])->name('update-ticket');




Route::post('/search', [UserController::class, 'search'])->name('search');


