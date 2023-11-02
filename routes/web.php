<?php

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

Route::get('settings',SettingView::class)->middleware(['auth'])->name('settings');

Route::get('bautismos',BautismoView::class)->middleware(['auth'])->name('bautismos');
Route::get('bautismos/create',BautismoCreateView::class)->middleware(['auth'])->name('bautismos.create');
Route::get('bautismos/{bautismo_id}',BautismoCreateView::class)->middleware(['auth'])->name('bautismos.show');

Route::get('matrimonios',MatrimonioView::class)->middleware(['auth'])->name('matrimonios');
Route::get('matrimonios/create',action: MatrimonioCreateView::class)->middleware(['auth'])->name('matrimonios.create');
Route::get('matrimonios/{matrimonio_id}',MatrimonioCreateView::class)->middleware(['auth'])->name('matrimonios.show');
Route::get('matrimonios/{matrimonio_id}/report',function($matrimonio_id){
    $document = Document::find($matrimonio_id);
    $setting = Setting::first();
    $data['document'] = $document;
    $data['setting'] = $setting;
    $data['created'] = \Carbon\Carbon::now();
    $data['date'] = \Carbon\Carbon::parse($document->date);
    return view('reports.matrimonio',$data);
})->middleware(['auth'])->name('matrimonios.report');

Route::get('confirmaciones',ConfirmacionView::class)->middleware(['auth'])->name('confirmaciones');
Route::get('confirmaciones/create',ConfirmacionCreateView::class)->middleware(['auth'])->name('confirmaciones.create');
Route::get('confirmaciones/{confirmacion_id}',ConfirmacionCreateView::class)->middleware(['auth'])->name('confirmaciones.show');
require __DIR__.'/auth.php';
