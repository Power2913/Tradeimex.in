<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CountriesdataController;
use App\Http\Controllers\ContinentDataController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CareerFormController;
use App\Http\Controllers\PartnersFormController;
use App\Http\Controllers\ModalMailController;
use App\Http\Controllers\HsCodeController;
use App\Http\Controllers\BlogData;
use App\Http\Controllers\SearchLiveDataController;
use Mews\Captcha\CaptchaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LinkController::class,'index']);
Route::get('/', [CountriesdataController::class, 'countrydata'])->name('countrydata');
Route::get('captcha/math', [ContactFormController::class, 'myCaptcha']);
Route::get('refresh_captcha', [ContactFormController::class, 'refreshCaptcha'])->name('refresh_captcha');
// Route::get('captcha/default', [\Mews\Captcha\CaptchaController::class, 'getCaptcha']);
Route::get('/about-us', [LinkController::class,'aboutus']);
Route::get('/why-choose-us', [LinkController::class,'whychooseus']);
Route::get('/find-buyer-supplier', [LinkController::class,'fbs']);
Route::get('/careers', [LinkController::class,'carrers']);
Route::get('/our-clients', [LinkController::class,'clients']);
Route::get('/partners', [LinkController::class,'partners']);
Route::get('/faqs', [LinkController::class,'FAQ']);
Route::get('/disclaimer', [LinkController::class,'disclaimer']);
Route::get('/terms-of-use', [LinkController::class,'tou']);
Route::get('/privacy-policy', [LinkController::class,'privacy']);
Route::get('/thankyou', [LinkController::class,'thankyou'])->name('thankyou');
Route::get('/contact-us', [LinkController::class,'contactus']);
Route::get('/products', [LinkController::class,'products']);
Route::get('/customs-data', [CountriesdataController::class,'customsdata']);
Route::get('/statistical-data', [CountriesdataController::class,'statisticaldata']);
Route::get('/bl-data', [CountriesdataController::class,'blreport']);
Route::get('/analytical-custom-report', [LinkController::class,'customizedanalyticaldata']);
Route::get('/blogs', [LinkController::class, 'blogs']);
//searchlivedata
Route::get('/search-live-data', [LinkController::class, 'searchlivedata']);
Route::get('/searchresult', [LinkController::class, 'searchresult']);
Route::get('/robots.txt', function () {
    return response()->file(public_path('robots.txt'));
});

// Trade
Route::get('/global-trade-data', [CountriesdataController::class,'globaltradedata']);
// Search live Data
Route::get('/search-live', [SearchLiveDataController::class, 'handleForm'])->name('product.list');
// Route for type 'data'
Route::get('/search-data/{section_type}/{search_country?}/{type}/{role}/{description?}/{hs_code?}', [SearchLiveDataController::class, 'search'])
     ->name('search.data');

// Route for type 'company' with 'er' appended to role
Route::get('/search-data/{section_type}/{country}/{type}/{role}er/{description?}/{hs_code?}', [SearchLiveDataController::class, 'search'])
     ->name('search.company');
// Route::get('/search-1/{section_type}/{country}/{type}/{role}/{filterby}-{filterdata?}', [SearchLiveDataController::class, 'searchFilter'])->name('hs-code');
// Route::get('/search-01/{section_type}/{country}/{type}/{role}/{search}-{base_search}/{filterby}-{filterdata?}', [SearchLiveDataController::class, 'searchFilter'])->name('search-filter');
// Route::get('/search-2/{section_type}/{type}/{role}/{filterby}-{filterdata}/{filterby1}-{filterdata1}', [SearchLiveDataController::class, 'searchFilter1'])->name('searchfilterone');
// Route::get('/search2/{section_type}/{type}/{role}/{filterby}-{filterdata}/{filterby1}-{filterdata1}', [SearchLiveDataController::class, 'searchFilter1'])->name('search-filterone');
// Route::get('/search-02/{section_type}/{type}/{role}/{search}-{base_search}/{filterby}-{filterdata}/{filterby1}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter1'])->name('search-filter-one');
// Route::get('/search-03/{section_type}/{type}/{role}/{filterby}-{filter}/{filterby1}-{filterdata}/{filterby2}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter2'])->name('searchfiltertwo');

// Route::get('/search-03/{section_type}/{type}/{role}/{search}-{searchDetails1}/{filterby}-{filter}/{filterby1}-{filterdata}/{filterby2}-{filterdata1?}', [SearchLiveDataController::class, 'searchFilter2'])->name('search-filter-two');
// Route::get('/search-04/{section_type}/{type}/{role}/{search}-{searchDetails1}/{filterby}-{filter}/{filterby1}-{filterdata}/{filterby2}-{filterdata1}', [SearchLiveDataController::class, 'searchFilter2'])->name('filter-two');

// HS - Code
Route::get('/search', [HsCodeController::class, 'searchHSCode'])->name('searchHSCode');
Route::get('/list/{listdescription}/{listhscode}', [HsCodeController::class, 'ListPage'])->name('list');
Route::get('/hs-code', [HsCodeController::class, 'hscode']);
Route::get('/hs-code-subchapter-list/{subchapterdescription}/{subchaptercode}', [HsCodeController::class, 'subchapterListPage'])->name('subchapterlist.list');
Route::get('/hs-code-subchapter/{description}/{chapterCode}', [HsCodeController::class, 'subchapterPage'])->name('subchapter.list');


// Continent data
Route::get('/{continent}-trade-data', [ContinentDataController::class, 'continentData'])
    ->where('continent', '[a-zA-Z\-]+')
    ->name('continent.tradeData');

// Country Data
Route::get('/{country}-{Datatype}', [CountriesdataController::class, 'countryalldata'])
    ->where('country', '[a-zA-Z\-]+')
    ->name('countryalldata');

Route::get('/hscode-search-data/{description}/{hsCode}', [HsCodeController::class, 'searchlist'])->name('search.list');
// Search HS Code (POST method)


// Contact Form
Route::post('/contact', [ContactFormController::class, 'sendContactForm'])->name('contact.send');
Route::post('/career', [CareerFormController::class, 'sendCareerApplication'])->name('career.send');
Route::post('/modal', [ModalMailController::class, 'sendinsightForm'])->name('insight.send');
Route::post('/partner', [PartnersFormController::class, 'PartnerForm'])->name('partner.send');
