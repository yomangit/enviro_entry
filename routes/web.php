<?php

use App\Models\FreshWater;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DustController;
use App\Http\Controllers\BiotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoiseController;
use App\Http\Controllers\MarineController;
use App\Http\Controllers\StdBlastingTable;
use App\Http\Controllers\AuthDustController;
use App\Http\Controllers\AuthGroundWaterMSM;
use App\Http\Controllers\AuthGroundWaterTTN;
use App\Http\Controllers\BlastingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthNoiseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthMarineController;
use App\Http\Controllers\FreshWaterController;
use App\Http\Controllers\AuthBlastingController;
use App\Http\Controllers\CodeSampleNMController;
use App\Http\Controllers\AuthWellLevelController;
use App\Http\Controllers\DashboardAuthController;
use App\Http\Controllers\LocationBiotaController;
use App\Http\Controllers\AuthFreshwaterController;
use App\Http\Controllers\PointIdBlastingController;
use App\Http\Controllers\AuthSurfaceWaterController;
use App\Http\Controllers\ResourceDataEntryController;
use App\Http\Controllers\ResourceMasterTTNController;
use App\Http\Controllers\ResourceWellLevelController;
use App\Http\Controllers\ResourceCodeSampleController;
use App\Http\Controllers\ResourceMasterGWGwController;
use App\Http\Controllers\ResourceCodeSampleDgController;
use App\Http\Controllers\ResourceCodeSampleGwController;
use App\Http\Controllers\ResourceCodeSampleTTNController;
use App\Http\Controllers\ResourceTblStandardStandardController;

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

//auth
Route::get('/',[DashboardAuthController::class,'index']);
Route::get('/dashboard/dataentry/arp2', function () {return view('dashboard.dataentry.arp2',["tittle"=>"ARP-02","breadcrumb"=>"Data Entry"]);})->middleware('auth');
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::get('/auth/biotasampling/freshwater',[AuthFreshwaterController::class,'index'])->middleware('auth');
Route::get('/auth/biotasampling/marine',[AuthMarineController::class,'index'])->middleware('auth');
Route::get('/auth/groundwater/msm',[AuthGroundWaterMSM::class,'index'])->middleware('auth');
Route::get('/auth/groundwater/ttn',[AuthGroundWaterTTN::class,'index'])->middleware('auth');
Route::get('/auth/groundwater/welllevel',[AuthWellLevelController::class,'index'])->middleware('auth');
Route::get('/auth/airquality/dust',[AuthDustController::class,'index'])->middleware('auth');
Route::get('/auth/airquality/noise',[AuthNoiseController::class,'index'])->middleware('auth');
Route::get('/auth/surfacewater',[AuthSurfaceWaterController::class,'index'])->middleware('auth');
Route::get('/auth/blasting',[AuthBlastingController::class,'index'])->middleware('auth');
Route::post('/register',[RegisterController::class,'store']);   
//admin
Route::get('/dashboard/master',[DashboardController::class,'index'])->middleware('admin');
Route::resource('/dashborad/dustgauge/noisemeter/noise/location',LocationController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/index/codesample', ResourceCodeSampleController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/index/dataentry', ResourceDataEntryController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/groundwater/masterttn/codesamplettn', ResourceCodeSampleTTNController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/groundwater/mastergw', ResourceMasterGWGwController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/groundwater/masterttn', ResourceMasterTTNController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/groundwater/standard', ResourceTblStandardStandardController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/groundwater/level', ResourceWellLevelController::class)->except('show','edit','delete')->middleware('admin');
Route::resource('/dashboard/groundwater/mastergw/codesamplegw', ResourceCodeSampleGwController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/dustgauge/dust/codesampledg', ResourceCodeSampleDgController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/dustgauge/dust', DustController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/dustgauge/noisemeter/noise/codesamplenm', CodeSampleNMController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/dustgauge/noisemeter/noise', NoiseController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/monitoring/freshwater/biota',BiotaController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/monitoring/location',LocationBiotaController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/monitoring/freshwater/master',FreshWaterController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/monitoring/marine',MarineController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/blasting',BlastingController::class)->middleware('admin')->except('show');
Route::resource('/dashboard/blasting/pointid',PointIdBlastingController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/blasting/tablestandard',StdBlastingTable::class)->middleware('admin')->except('show');
// export & import
Route::get('/exportdata', [ResourceDataEntryController::class,'dataexport'])->middleware('admin');
Route::post('/importdata', [ResourceDataEntryController::class,'dataimportexcel'])->middleware('admin');
Route::get('/exportmastergw', [ResourceMasterGWGwController::class,'MasterExportGWExcel'])->middleware('admin');
Route::post('/importmastergw', [ResourceMasterGWGwController::class,'MasterImportGWExcel'])->middleware('admin');
Route::get('/exportmasterttn', [ResourceMasterTTNController::class,'MasterExportTTNExcel'])->middleware('admin');
Route::post('/importmasterttn', [ResourceMasterTTNController::class,'MasterImportTTNExcel'])->middleware('admin');
Route::get('/exportcodesamplegw', [ResourceCodeSampleGwController::class,'ExportCodeSampleGW'])->middleware('admin');
Route::post('/importcodesamplegw', [ResourceCodeSampleGwController::class,'ImportCodeSampleGW'])->middleware('admin');
Route::get('/exportcodesamplettn', [ResourceCodeSampleTTNController::class,'ExportCodeSampleTTN'])->middleware('admin');
Route::post('/importcodesamplettn', [ResourceCodeSampleTTNController::class,'ImportCodeSampleTTN'])->middleware('admin');
Route::get('/exportcodesampledg', [ResourceCodeSampleDgController::class,'ExportCodeSampleDG'])->middleware('admin');
Route::post('/importcodesampledg', [ResourceCodeSampleDgController::class,'ImportCodeSampleDG'])->middleware('admin');
Route::get('/exportcodesamplesw', [ResourceCodeSampleController::class,'ExportCodeSampleSW'])->middleware('admin');
Route::post('/importcodesamplesw', [ResourceCodeSampleController::class,'ImportCodeSampleSW'])->middleware('admin');
Route::get('/exportdatanoise', [NoiseController::class,'ExportDataNoise'])->middleware('admin');
Route::post('/importdatanoise', [NoiseController::class,'ImportDataNoise'])->middleware('admin');
Route::get('/exportlocation', [LocationController::class,'ExportLocation'])->middleware('admin');
Route::post('/importlocation', [LocationController::class,'ImportLocation'])->middleware('admin');
Route::get('/exportbiota', [BiotaController::class,'ExportBiota'])->middleware('admin'); 
Route::post('/importbiota', [BiotaController::class,'ImportBiota'])->middleware('admin');
Route::get('/exportlocationbiota', [LocationBiotaController::class,'ExportLocationBiota'])->middleware('admin');
Route::post('/importlocationbiota', [LocationBiotaController::class,'ImportLocationBiota'])->middleware('admin');
Route::get('/exportmarine', [MarineController::class,'ExportMarine'])->middleware('admin');
Route::post('/importmarine', [MarineController::class,'ImportMarine'])->middleware('admin');
Route::get('/exportfreshwater', [FreshWaterController::class,'ExportFreshwater'])->middleware('admin');
Route::post('/importfreshwater', [FreshWaterController::class,'ImportFreshwater'])->middleware('admin');
Route::get('/export/blasting', [BlastingController::class,'ExportBlasting'])->middleware('admin');
Route::post('/import/blasting', [BlastingController::class,'ImportBlasting'])->middleware('admin');