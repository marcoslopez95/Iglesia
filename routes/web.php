<?php

use App\Http\Controllers\ReportController;
use App\Http\Middleware\onlyAdmin;
use App\Livewire\Bautismo\BautismoCreateView;
use App\Livewire\BautismoView;
use App\Livewire\Confirmacion\CreateView as ConfirmacionCreateView;
use App\Livewire\ConfirmacionView;
use App\Livewire\Matrimonio\CreateView as MatrimonioCreateView;
use App\Livewire\MatrimonioView;
use App\Livewire\Settings\SettingView;
use App\Models\Document;
use App\Models\Setting;
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

Route::get('settings',SettingView::class)->middleware(['auth'])->name('settings')->middleware(onlyAdmin::class);

Route::get('bautismos',BautismoView::class)->middleware(['auth'])->name('bautismos');
Route::get('bautismos/create',BautismoCreateView::class)->middleware(['auth'])->name('bautismos.create')->middleware(onlyAdmin::class);
Route::get('bautismos/{bautismo_id}',BautismoCreateView::class)->middleware(['auth'])->name('bautismos.show')->middleware(onlyAdmin::class);
Route::get('bautismos/{bautismo_id}/report',[ReportController::class,'bautismos'])->middleware(['auth'])->name('bautismos.report');

Route::get('matrimonios',MatrimonioView::class)->middleware(['auth'])->name('matrimonios');
Route::get('matrimonios/create',action: MatrimonioCreateView::class)->middleware(['auth'])->name('matrimonios.create')->middleware(onlyAdmin::class);
Route::get('matrimonios/{matrimonio_id}',MatrimonioCreateView::class)->middleware(['auth'])->name('matrimonios.show')->middleware(onlyAdmin::class);
Route::get('matrimonios/{matrimonio_id}/report',[ReportController::class,'matrimonios'])->middleware(['auth'])->name('matrimonios.report');

Route::get('confirmaciones',ConfirmacionView::class)->middleware(['auth'])->name('confirmaciones');
Route::get('confirmaciones/create',ConfirmacionCreateView::class)->middleware(['auth'])->name('confirmaciones.create')->middleware(onlyAdmin::class);
Route::get('confirmaciones/{confirmacion_id}',ConfirmacionCreateView::class)->middleware(['auth'])->name('confirmaciones.show')->middleware(onlyAdmin::class);
Route::get('confirmaciones/{confirmacion_id}/report',[ReportController::class,'confirmaciones'])->middleware(['auth'])->name('confirmaciones.report');
require __DIR__.'/auth.php';
