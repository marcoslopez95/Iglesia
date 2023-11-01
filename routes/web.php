<?php

use App\Livewire\Bautismo\BautismoCreateView;
use App\Livewire\BautismoView;
use App\Livewire\Settings\SettingView;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn()=> redirect()->route('login'));

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('settings',SettingView::class)->middleware(['auth'])->name('settings');
Route::get('bautismos',BautismoView::class)->middleware(['auth'])->name('bautismos');
Route::get('bautismos/create',BautismoCreateView::class)->middleware(['auth'])->name('bautismos.create');

require __DIR__.'/auth.php';
