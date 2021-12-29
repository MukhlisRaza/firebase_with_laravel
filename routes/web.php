<?php

use App\Http\Controllers\FirebaseController;
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

Route::get('contacts', [FirebaseController::class, 'index']);
Route::get('addContact', [FirebaseController::class, 'addContact']);
Route::post('add-contact', [FirebaseController::class, 'addContactCommit']);
Route::get('edit-contacts/{id}', [FirebaseController::class, 'editContact']);
Route::put('update-contact/{id}', [FirebaseController::class, 'updateDataCommit']);
Route::get('delete-contact/{id}', [FirebaseController::class, 'DeleteData']);

Route::get('/', function () {
    return view('welcome');
});
