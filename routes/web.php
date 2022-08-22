<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Main;

Route::get('/', Main::class)->name('home');

Route::get('short-link/{hash}', [MainController::class, 'linkManage'])->name('shortLink');
