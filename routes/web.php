<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddBusinessController;
use App\Http\Controllers\SearchController;

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

// Search page view
Route::get('/search', [SearchController::class, 'searchView'])->name('searchView');
// search page search 
Route::post('/search', [SearchController::class, 'searchBar'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');



// Admin view
Route::prefix('admin')->group(function(){

    // All business List
    Route::get('/allBusinessList', [AddBusinessController::class, 'allBusinessListView'])->middleware(['auth:admin', 'verified'])->name('allBusinessList');

    // business details
    Route::get('/businessDetails/{id}', [AddBusinessController::class, 'businessDetailsView'])->middleware(['auth:admin', 'verified'])->name('businessDetails');

    // Admin add new business
    Route::get('/newBusiness', [AddBusinessController::class, 'newBusinessAddView'])->middleware(['auth:admin', 'verified'])->name('newBusinessAdd');

});

require __DIR__.'/adminauth.php';