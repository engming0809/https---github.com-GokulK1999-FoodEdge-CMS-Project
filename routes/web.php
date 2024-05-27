<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewItemDetailsController;
use App\Http\Controllers\AddItemController;
use App\Http\Controllers\EditItemDetailsController;
use App\Http\Controllers\CateringBookingController;
use App\Http\Controllers\AddCateringBookingController;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('item-details', [ViewItemDetailsController::class,'viewItemDetails']);
Route::get('edit-item-details', [EditItemDetailsController::class,'editItemDetails']);
Route::put('update-details/{id}', [EditItemDetailsController::class, 'updateItemDetails'])->name('update-details');
Route::get('delete-item-details/{id}', [EditItemDetailsController::class,'deleteItemDetails']);
Route::get('image-form', [ImageUploadController::class, 'index']);
Route::post('upload', [ImageUploadController::class, 'upload']);
Route::post('submit-item', [AddItemController::class, 'addItem'])->name('submit.item');
Route::get('add-item', [AddItemController::class, 'additemform']);
Route::get('view-menu-page', [HomeController::class, 'viewmenupage']);
Route::get('/catering-booking', [CateringBookingController::class, 'index']);
Route::get('/customer-booking', [CateringBookingController::class, 'customerindex']);
Route::get('customerviewallproduct', [HomeController::class, 'customerviewallproduct']);
Route::get('add-booking', [AddCateringBookingController::class, 'addbookingform']);
Route::post('submit-booking', [AddCateringBookingController::class, 'addBooking'])->name('submit.booking');
Route::get('edit-booking-details', [CateringBookingController::class,'editBooking']);
Route::put('update-booking/{id}', [CateringBookingController::class, 'updateBooking'])->name('update-booking');
Route::get('delete-booking-details/{id}', [CateringBookingController::class,'deleteBooking']);
Route::get('cancel-booking-details/{id}', [CateringBookingController::class,'cancelBooking']);


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified','client'])
    ->name('dashboard');

    Route::view('management', 'management')
    ->middleware(['auth', 'verified','management'])
    ->name('management');

    Route::view('operation', 'operation')
    ->middleware(['auth', 'verified','operation'])
    ->name('operation');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';





Route::get('/managementmenu',[HomeController::class,'index']);
Route::get('/menu',[HomeController::class,'customerindex']);

Route::get('/redirect',[HomeController::class,'redirect']);


