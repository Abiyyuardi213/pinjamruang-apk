<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::view('/fitur', 'pages.features')->name('features');
Route::view('/alur-peminjaman', 'pages.workflow')->name('workflow');
Route::view('/showcase', 'pages.showcase')->name('showcase');
