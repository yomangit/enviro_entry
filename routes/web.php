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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthNoiseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HydroCodeController;
use App\Http\Controllers\AuthMarineController;
use App\Http\Controllers\DrinkWaterController;
use App\Http\Controllers\FreshWaterController;
use App\Http\Controllers\GwStandardController;
use App\Http\Controllers\HydrometricController;
use App\Http\Controllers\WDAutomaticController;
use App\Http\Controllers\AuthBlastingController;
use App\Http\Controllers\CodeSampleNMController;
use App\Http\Controllers\AuthWellLevelController;
use App\Http\Controllers\DashboardAuthController;
use App\Http\Controllers\LocationBiotaController;
use App\Http\Controllers\LocationNoiseController;
use App\Http\Controllers\StdDrinkWaterController;
use App\Http\Controllers\AuthFreshwaterController;
use App\Http\Controllers\PointIdBlastingController;
use App\Http\Controllers\QualityStandardController;
use App\Http\Controllers\AuthSurfaceWaterController;
use App\Http\Controllers\AuthResumeTahunanController;
use App\Http\Controllers\PointIdDrinkWaterController;
use App\Http\Controllers\ResourceDataEntryController;
use App\Http\Controllers\ResourceMasterTTNController;
use App\Http\Controllers\ResourceWellLevelController;
use App\Http\Controllers\ResourceCodeSampleController;
use App\Http\Controllers\ResourceMasterGWGwController;
use App\Http\Controllers\ResumeBulananNoiseController;
use App\Http\Controllers\ResumeTahunanNoiseController;
use App\Http\Controllers\ResourceCodeSampleDgController;
use App\Http\Controllers\ResourceCodeSampleGwController;
use App\Http\Controllers\ResourceCodeSampleTTNController;
use App\Http\Controllers\AuthResumeMonthlyNoiseController;

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
Route::get('/auth/airquality/resumebulanan',[AuthResumeMonthlyNoiseController::class,'index'])->middleware('auth');
Route::get('/auth/airquality/resumetahunan',[AuthResumeTahunanController::class,'index'])->middleware('auth');
Route::post('/register',[RegisterController::class,'store']);   
//admin
Route::get('/dashboard/master',[DashboardController::class,'index'])->middleware('admin');
Route::resource('/surfacewater/qualityperiode/codesample', ResourceCodeSampleController::class)->middleware('admin');
Route::resource('/surfacewater/qualityperiode', ResourceDataEntryController::class)->middleware('admin');
Route::resource('/surfacewater/drinkwater/quantity',StdDrinkWaterController::class)->middleware('admin');
Route::resource('/surfacewater/drinkwater/pointid',PointIdDrinkWaterController::class)->middleware('admin');
Route::resource('/surfacewater/drinkwater',DrinkWaterController::class)->middleware('admin');
Route::resource('/groundwater/masterttn/codesamplettn', ResourceCodeSampleTTNController::class)->middleware('admin');
Route::resource('/groundwater/mastergw', ResourceMasterGWGwController::class)->middleware('admin');
Route::resource('/groundwater/masterttn', ResourceMasterTTNController::class)->middleware('admin');
Route::resource('/groundwater/standard', GwStandardController::class)->middleware('admin');
Route::resource('/groundwater/level', ResourceWellLevelController::class)->except('show','edit','delete')->middleware('admin');
Route::resource('/groundwater/mastergw/codesamplegw', ResourceCodeSampleGwController::class)->middleware('admin');
Route::resource('/airquality/dustgauge/dust/codesampledg', ResourceCodeSampleDgController::class)->middleware('admin');
Route::resource('/airquality/dustgauge/dust', DustController::class)->middleware('admin');
Route::resource('/airquality/noisemeter/noise/codesamplenm', CodeSampleNMController::class)->middleware('admin');
Route::resource('/airquality/noisemeter/noise/locationnoise',LocationNoiseController::class)->middleware('admin');
Route::resource('/airquality/noisemeter/noise', NoiseController::class)->middleware('admin');
Route::resource('/monitoring/freshwater/biota',BiotaController::class)->middleware('admin');
Route::resource('/monitoring/location',LocationBiotaController::class)->middleware('admin');
Route::resource('/monitoring/freshwater/master',FreshWaterController::class)->middleware('admin');
Route::resource('/monitoring/marine',MarineController::class)->middleware('admin');
Route::resource('/blasting',BlastingController::class)->middleware('admin');
Route::resource('/blasting/pointid',PointIdBlastingController::class)->middleware('admin');
Route::resource('/blasting/tablestandard',StdBlastingTable::class)->middleware('admin');
Route::resource('/airquality/noisemeter/resumebulanan',ResumeBulananNoiseController::class)->middleware('admin');
Route::resource('/airquality/noisemeter/resumetahunan',ResumeTahunanNoiseController::class)->middleware('admin');
Route::resource('/hydrometric/wlvp/qualitystandard',QualityStandardController::class)->middleware('admin');
Route::resource('/hydrometric/wlvp/point',HydroCodeController::class)->middleware('admin');
Route::resource('/hydrometric/wlvp',HydrometricController::class)->middleware('admin');
Route::resource('/hydrometric/waterdischarge',WDAutomaticController::class)->middleware('admin');
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
Route::get('/export/codehydro',[HydroCodeController::class,'ExportCodeHydro'])->middleware('admin');
Route::post('/import/codehydro',[HydroCodeController::class,'ImportCodeHydro'])->middleware('admin');
Route::get('/export/hydrometric',[HydrometricController::class,'ExportHydro'])->middleware('admin');
Route::post('/import/hydrometric',[HydrometricController::class,'ImportHydro'])->middleware('admin');
Route::get('/export/drinkwater/pointid',[PointIdDrinkWaterController::class,'ExportdrinkwaterPointId'])->middleware('admin');
Route::post('/import/drinkwater/pointid',[PointIdDrinkWaterController::class,'ImportdrinkwaterPointId'])->middleware('admin');
Route::get('/export/drinkwater/std',[StdDrinkWaterController::class,'ExportdrinkwaterStd'])->middleware('admin');
Route::post('/import/drinkwater/std',[StdDrinkWaterController::class,'ImportdrinkwaterStd'])->middleware('admin');
Route::get('/export/drinkwater',[DrinkWaterController::class,'Exportdrinkwater'])->middleware('admin');
Route::post('/import/drinkwater',[DrinkWaterController::class,'Importdrinkwater'])->middleware('admin');
Route::get('/exportdatanoise', [NoiseController::class,'ExportDataNoise'])->middleware('admin');
Route::post('/importdatanoise', [NoiseController::class,'ImportDataNoise'])->middleware('admin');
Route::get('/exportlocation', [LocationNoiseController::class,'ExportLocationNoise'])->middleware('admin');
Route::post('import/location/noise',[LocationNoiseController::class,'ImportLocationNoise'])->middleware('admin');
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
Route::get('/export/dust', [DustController::class,'ExportDust'])->middleware('admin');
Route::post('/import/dust', [DustController::class,'ImportDust'])->middleware('admin');
Route::get('/export/codesamplenm', [CodeSampleNMController::class,'ExportCodeSampleNM'])->middleware('admin');
Route::post('/import/codesamplenm', [CodeSampleNMController::class,'ImportCodeSampleNM'])->middleware('admin');
Route::get('/export/blasting/pointid', [PointIdBlastingController::class,'ExportPointId'])->middleware('admin');
Route::post('/import/blasting/pointid', [PointIdBlastingController::class,'ImportPointId'])->middleware('admin');
Route::get('/export/blasting/standart', [StdBlastingTable::class,'ExportStandardBlasting'])->middleware('admin');
Route::post('/import/blasting/standart', [StdBlastingTable::class,'ImportStandardBlasting'])->middleware('admin');
Route::get('/export/groundwater/standart', [GwStandardController::class,'ExportStandardGroundwater'])->middleware('admin');
Route::post('/import/groundwater/standart', [GwStandardController::class,'ImportStandardGroundwater'])->middleware('admin');