<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\CotrollerXML;
use App\Http\Controllers\SocietesController;
use App\Http\Controllers\CotrollerArchivages;


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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();

Route::get('/', function () {
    return redirect(route('dashboard'));
})->name('home');

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check()) {
    }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');



Route::GET('/importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');
Route::Post('/import', [ExcelController::class, 'showArticle'])->name('import');
// Route::GET('/importValid', [ExcelController::class, 'import'])->name('importValid');

Route::Post('/importValid', [ExcelController::class, 'import'])->name('importValid');

Route::GET('/exportXml', [CotrollerXML::class, 'afficherXML'])->name('exportXml');



Route::Post('/exportXmlValid', [CotrollerXML::class, 'exportXml'])->name('exportXmlValid');


Route::GET('/societe', [SocietesController::class, 'afficher'])->name('societe');
Route::GET('/societe/create', [SocietesController::class, 'create'])->name('createSociete');
Route::POST('/societe/store', [SocietesController::class, 'store'])->name('storeSociete');
Route::GET('/societe/show/{id}', [SocietesController::class, 'show'])->name('ShowSociete');
Route::GET('/societe/edit/{id}', [SocietesController::class, 'edit'])->name('EditSociete');
Route::put('/societe/update/{id}', [SocietesController::class, 'update'])->name('UpdateSociete');
Route::GET('/societe/delete/{id}', [SocietesController::class, 'destroy'])->name('DeleteSociete');


Route::GET('/afficherArchivages/{id}', [CotrollerArchivages::class, 'afficherArchivages'])->name('afficherArchivages');
Route::GET('/afficherArchivages/{id}', [CotrollerArchivages::class, 'afficherArchivages'])->name('afficherArchivages');

Route::Post('/afficherByDate', [CotrollerArchivages::class, 'afficherByDate'])->name('afficherByDate');




// Route::post('/importValid', function (Request $request) {
//   if (Request::ajax()) {
//        $data = $request->all();
//     $data = json_decode($data['data'], true);
//     }




//   // $data = $request->all();
//     // $data = json_decode($data['data'], true);
//     // $data = array_filter($data);
//     // $data = array_values($data);
//     // $data = array_chunk($data, 3);

// // console.log($request->id);
//   //  $name = $request->input('name');
//     // ... save in database | session
//   //  echo $name;
// })->name('importValid');