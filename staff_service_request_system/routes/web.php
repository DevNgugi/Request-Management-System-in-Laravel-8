<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\StaffController;

Route::get('/',[StaffController::class, 'index'])->middleware(['auth'])->name('users');
Route::get('/profile',[StaffController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::post('/adduser', [StaffController::class, 'adduser']);
Route::get('/getuser{id}', [StaffController::class, 'getuser']);

Route::get('/notif', [StaffController::class, 'getNotifs']);

Route::get('/items',[ItemController::class, 'index'])->middleware(['auth'])->name('items');
Route::get('/item{id}',[ItemController::class, 'getitem'])->middleware(['auth']);
Route::post('/item{id}',[ItemController::class, 'requestAction'])->middleware(['auth']);
Route::post('/item',[ItemController::class, 'store'])->middleware(['auth']);


Route::get('/leaves',[LeaveController::class, 'index'])->middleware(['auth'])->name('leaves');
Route::get('/leave/{id}',[LeaveController::class, 'getleave'])->middleware(['auth']);
Route::post('/leave',[LeaveController::class, 'store'])->middleware(['auth']);
Route::post('/leave/{id}',[LeaveController::class, 'requestAction'])->middleware(['auth']);


require __DIR__.'/auth.php';
