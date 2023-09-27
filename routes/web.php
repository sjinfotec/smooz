<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/', function () {
    return view('contents');
});
*/
/*Route::get('/', 'HomeController@index')->name('home');*/
//Auth::routes();
Route::get('/', [HomeController::class,'index'])->middleware('auth');
//Route::post('/home', [HomeController::class,'index'])->name('login');
Route::get('/home', [HomeController::class,'index'])->middleware('auth');
//Route::get('/', 'HomeController@index')->middleware('auth');
//Route::get('/', [HomeController::class,'index']);
Route::get('/base', [BaseController::class,'base'])->middleware('auth');

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login'); // view は auth.login2
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


//Route::get('/m_make', [MmakeController::class,'index'])->middleware('auth');
//Route::post('/m_make/get', [MmakeController::class,'getDataA'])->middleware('auth');
//Route::post('/m_make/update', [MmakeController::class,'fixA'])->middleware('auth');
//Route::post('/m_make/insert', [MmakeController::class,'storeA'])->middleware('auth');
//Route::post('/m_make/search', [MmakeController::class,'getDataAsearch'])->middleware('auth');

// 見積作成
Route::get('/quotations', [QuotationsController::class,'index'])->middleware('auth');
Route::post('/quotations/get', [QuotationsController::class,'getData'])->middleware('auth');
Route::post('/quotations/getone', [QuotationsController::class,'getDataOne'])->middleware('auth');
Route::post('/quotations/update', [QuotationsController::class,'fix'])->middleware('auth');
Route::post('/quotations/insert', [QuotationsController::class,'store'])->middleware('auth');

// 見積　フォーム・オフセット・組版・コレーター・ネームライナー
Route::get('/quotations/department', [QuotationsDepartmentController::class,'index'])->middleware('auth');
Route::post('/quotations/department/get', [QuotationsDepartmentController::class,'getData'])->middleware('auth');

// 見積　製本
Route::get('/quotations/binding', [QuotationsBindingController::class,'index'])->middleware('auth');
Route::post('/quotations/binding/get', [QuotationsBindingController::class,'getData'])->middleware('auth');

// 発送・費用・外注
Route::get('/quotations/cost', [QuotationsCostController::class,'index'])->middleware('auth');
Route::post('/quotations/cost/get', [QuotationsCostController::class,'getData'])->middleware('auth');


// 検索
Route::get('/qsearch', [QSearchController::class,'search'])->middleware('auth');
Route::post('/qsearch/get', [QSearchController::class,'getDataSearch'])->middleware('auth');
//Route::post('/openview.php', [QSearchController::class,'printview'])->middleware('auth');
Route::get('/qanotherline', [QAnotherlineController::class,'index'])->middleware('auth');

// パーツ
Route::post('/qparts/get', [QuotationsPartsController::class,'getPartsData'])->middleware('auth');


//Route::get('/parts', [PartsController::class,'index'])->middleware('auth');
//Route::post('/parts/get', [PartsController::class,'getitem']);
//Route::post('/parts/get', 'PartsController@getitem');
Route::post('/parts/get', [PartsController::class,'getitem'])->middleware('auth');
Route::post('/outsourcing/get', [OutsourcingController::class,'getRequest'])->middleware('auth');

// 見積書
Route::get('/qdoc', [QuotationsDocController::class,'index'])->middleware('auth');

// 印刷
Route::get('/print_q', [QuotationsController::class,'index'])->middleware('auth');
Route::post('/print_q/get', [QuotationsController::class,'getSeaDetail'])->middleware('auth');



// 管理
Route::get('/maintenance/backup', [BackupLogsController::class,'index'])->middleware('auth');
Route::post('/maintenance/backup/importmitumoridat', [BackupLogsController::class,'importMitumoridat'])->middleware('auth');




/*
Route::get('/home', function () {
    return view('auth.login2');
})->name('login');
*/

/*
Route::post('/home', function () {
    return view('auth.login2');
})->name('login');
*/

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
