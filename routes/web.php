<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->anggota->role;
        if ($role) {
            return redirect()->route("{$role}.dashboard");
        }
        return redirect()->route('dashboard');
    })->name('dashboard');

    Route::view('/admin/dashboard', 'livewire.pages.admin.dashboard')->name('admin.dashboard')->middleware('role:admin');
    Route::view('/ketum/dashboard', 'livewire.pages.ketum.dashboard')->name('ketum.dashboard')->middleware('role:ketum');
});

Route::view('/', 'welcome')->name('welcome');
Route::view('/sejarah', 'livewire.front.sejarah')->name('sejarah');
Route::view('/galeri', 'livewire.front.gallery')->name('gallery');
Route::view('/musik', 'divisi.index-musik')->name('index.musik');
Route::view('/foto', 'divisi.index-foto')->name('index.foto');
Route::view('/film', 'divisi.index-film')->name('index.film');
Route::view('/tari', 'divisi.index-tari')->name('index.tari');
Route::view('/teater', 'divisi.index-teater')->name('index.teater');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
