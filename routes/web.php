<?php

use App\Livewire\Pages\Admin\AddMainProker;
use App\Livewire\Pages\Admin\AddProker;
use App\Livewire\Pages\Admin\EditMainProker;
use App\Livewire\Pages\Admin\EditProker;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Pages\Admin\IndexMainProker;
use App\Livewire\Pages\Admin\IndexProker;
use Livewire\Livewire;

Route::middleware(['auth', 'verUser'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->anggota->role;
        if ($role) {
            return redirect()->route("{$role}.dashboard");
        }
        return redirect()->route('dashboard');
    })->name('dashboard');

    Route::view('/admin/dashboard', 'livewire.pages.admin.dashboard')->name('admin.dashboard')->middleware('role:admin');

    Route::get('/admin/indexmainproker', IndexMainProker::class)
        ->name('admin.indexmainproker')
        ->middleware('role:admin');
    Route::get('/admin/mainproker/{id}/edit', EditMainProker::class)
        ->name('admin.editmainproker')
        ->middleware('role:admin');
    Route::get('/admin/mainproker/add', AddMainProker::class)
        ->name('admin.addmainproker')
        ->middleware('role:admin');

    Route::get('/admin/indexproker', IndexProker::class)
        ->name('admin.indexproker')
        ->middleware('role:admin');
    Route::get('/admin/proker/{id}/edit', EditProker::class)
        ->name('admin.editproker')
        ->middleware('role:admin');
    Route::get('/admin/proker/add', AddProker::class)
        ->name('admin.addproker')
        ->middleware('role:admin');


    Route::view('/ketum/dashboard', 'livewire.pages.ketum.dashboard')->name('ketum.dashboard')->middleware('role:ketum');
});

Route::view('/splash', 'splash')->name('splash')->middleware('cache.page');
Route::view('/', 'welcome')->middleware('first.visit')->name('welcome');
Route::view('/sejarah', 'livewire.front.sejarah')->name('sejarah')->middleware('cache.page');
Route::view('/galeri', 'livewire.front.gallery')->name('gallery');
Route::view('/musik', 'divisi.index-musik')->name('index.musik');
Route::view('/foto', 'divisi.index-foto')->name('index.foto');
Route::view('/film', 'divisi.index-film')->name('index.film');
Route::view('/tari', 'divisi.index-tari')->name('index.tari');
Route::view('/teater', 'divisi.index-teater')->name('index.teater');

Route::get('/main-proker/{proker}', App\Livewire\Contentmanager\MainProkerArticle::class)->name('mainproker.show');
Route::get('/proker/{id}', [\App\Livewire\Contentmanager\ProkerArticle::class])->name('proker.show');
Route::get('/karya/{id}', [\App\Livewire\Contentmanager\KaryaArticle::class])->name('karya.show');


Route::view('profile', 'profile')
    ->middleware(['auth', 'verUser'])
    ->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

//pranks
Route::view('/login', 'nothing');
Route::view('/adm', 'nothing');

require __DIR__ . '/auth.php';
