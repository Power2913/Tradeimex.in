<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchLiveDataController;

/*
|--------------------------------------------------------------------------
| Country Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Country data routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/debug', function () {
    return 'Country routes are loaded!';
});
Route::get('/search-data/{section_type}/{country}/{type}/{role}er/{description?}/{hs_code?}', [SearchLiveDataController::class, 'search'])
     ->name('search.company');
Route::group(['prefix' => 'search'], function () {
    Route::get('/{section_type}/{country?}/{type}/{role}/{filterby}-{filterdata}', [SearchLiveDataController::class, 'searchFilter'])->name('hs-code');
    // Route::get('/{type}/{role}/{filterby}-{filterdata}/{filterby1}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter1'])->name('search-filterone');
    Route::get('/{section_type}/{country?}/{type}/{role}/{filterby}-{filterdata}/{filterby1?}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter1'])->name('searchfilterone');
    Route::get('/{section_type}/{country?}/{type}/{role}/{search}-{base_search?}/{filterby}-{filterdata?}', [SearchLiveDataController::class, 'searchFilter'])->name('search-filter');
    Route::get('/{section_type}/{country?}/{type}/{role}/{search}-{base_search?}/{filterby}-{filterdata}/{filterby1}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter1'])->name('search-filter-one');
    Route::get('/{section_type}/{country?}/{type}/{role}/{filterby}-{filter}/{filterby1}-{filterdata}/{filterby2}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter2'])->name('searchfiltertwo');
    Route::get('/{section_type}/{country}/{type}/{role}/{search}-{searchDetails1}/{filterby}-{filter}/{filterby1}-{filterdata}/{filterby2?}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter2'])->name('search-filter-two');
});
