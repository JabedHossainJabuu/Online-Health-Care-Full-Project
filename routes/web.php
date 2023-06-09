<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/home', [HomeController::class, 'redirect'])->name('home.index');
Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myAppointment', [HomeController::class, 'myAppointment'])->name('my-appointment');
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancelAppointment'])->name('cancel-appointment');
Route::get('/show_appointment', [AdminController::class, 'show_appointment'])->name('admin.showAppointment');
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/show_doctor', [AdminController::class, 'showDoctor']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('/update_doctor/{id}', [AdminController::class, 'updateDoctor']);
Route::post('/edit_doctor/{id}', [AdminController::class, 'editDoctor']);
Route::get('/show_news', [AdminController::class, 'showNews'])->name('admin.showNews');
Route::get('/delete_news/{id}', [AdminController::class, 'delete_news'])->name('admin.deleteNews');
Route::get('/update_news/{id}', [AdminController::class, 'update_news'])->name('admin.updateNews');
Route::post('/edit_news/{id}', [AdminController::class, 'edit_news'])->name('admin.editNews');
Route::post('/store_news', [AdminController::class, 'storeNews'])->name('admin.storeNews');

Route::get('/doctors', [HomeController::class, 'doctorPage'])->name('show.doctor');
Route::get('/about-us', [HomeController::class, 'About_us'])->name('show.about-us');
Route::get('/blogs', [HomeController::class, 'blog'])->name('show.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('show.contact');
Route::view('/chat', 'chat')->name('chat');
Route::view('/protection', 'protection')->name('protection');
Route::view('/pharmacy', 'pharmacy')->name('pharmacy');
Route::view('/career', 'career')->name('career');
Route::view('/team', 'team')->name('team');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/doc', 'doc')->name('doc');
