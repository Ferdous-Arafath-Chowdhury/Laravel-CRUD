<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student_Controller;


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

// Route::get('/', function () {
//     return view('student');
// });
Route::get('/',[Student_Controller::class , 'init'])->name('st'); 

Route::get('/student',[Student_Controller::class , 'init'])->name('st');

Route::view('/add','form')->name('add');


Route::post('/student',[Student_Controller::class , 'saveT'])->name('save_data');
Route::get('/student/{id}/edit',[Student_Controller::class , 'edit'])->name('st.edit');
Route::put('/student/{id}/update',[Student_Controller::class , 'update'])->name('st.update');
Route::delete('/student/{id}', [Student_Controller::class, 'destroy'])->name('st.destroy'); 

Route::get('/pdf_view/{id}/pdf', [Student_Controller::class, 'generatePDF'])->name('pd.pdf');
