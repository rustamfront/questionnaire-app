<?php

use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [QuestionnaireController::class, 'index'])->name('index');
Route::post('/', [QuestionnaireController::class, 'store'])->name('store');

require __DIR__.'/auth.php';
