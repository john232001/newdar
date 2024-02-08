<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    //Dashboard Route
    Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');

    //Landholding Routes
    Route::get('admin/landholding', [App\Http\Controllers\admin\LandholdingController::class, 'index'])->name('landholding');
    Route::post('admin/landholding/store', [App\Http\Controllers\admin\LandholdingController::class, 'store'])->name('landholding_store');
    Route::put('admin/landholding_update/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'update'])->name('landholding_update');
    Route::get('admin/landholding_delete/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'delete'])->name('landholding_delete');
    Route::get('admin/download_title/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'downloadtitle'])->name('download_title');
    Route::get('admin/download_taxDec/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'downloadtaxDec'])->name('download_taxDec');
    Route::get('admin/landholding/view/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'show'])->name('landholding_view');

    // Officer Routes
    Route::get('admin/officers', [App\Http\Controllers\admin\OfficerController::class, 'index'])->name('officers');
    Route::post('admin/officer/store', [App\Http\Controllers\admin\OfficerController::class, 'store'])->name('officer_store');
    Route::put('admin/officer/update/{id}', [App\Http\Controllers\admin\OfficerController::class, 'update'])->name('officer_update');
    Route::get('admin/officer/delete/{id}', [App\Http\Controllers\admin\OfficerController::class, 'delete'])->name('officer_delete');

    // User Account Routes
    Route::get('admin/user-account', [App\Http\Controllers\admin\UserAccountController::class, 'index'])->name('user_account');
    Route::post('admin/user-account/store', [App\Http\Controllers\admin\UserAccountController::class, 'store'])->name('user_account_store');
    Route::get('admin/user-account/delete/{id}', [App\Http\Controllers\admin\UserAccountController::class, 'delete'])->name('user_account_delete');
    Route::put('admin/user-account/update/{id}', [App\Http\Controllers\admin\UserAccountController::class, 'update'])->name('user_account_update');

    // ARB Routes
    Route::post('admin/arb/store', [App\Http\Controllers\admin\ArbController::class, 'store'])->name('arb_store');
    Route::put('admim/arb/update/{id}', [App\Http\Controllers\admin\ArbController::class, 'update'])->name('arb_update');
    Route::get('admin/arb/delete/{id}', [App\Http\Controllers\admin\ArbController::class, 'delete'])->name('arb_delete');

    // Lots Routes
    Route::post('admin/lot/store', [App\Http\Controllers\admin\LotController::class, 'store'])->name('lot_store');
    Route::put('admin/lot/update/{id}', [App\Http\Controllers\admin\LotController::class, 'update'])->name('lot_update');
    Route::get('admin/lot/delete/{id}', [App\Http\Controllers\admin\LotController::class, 'delete'])->name('lot_delete');

    // ASP`s Routes
    Route::post('admin/asp/store', [App\Http\Controllers\admin\AspController::class, 'store'])->name('asp_store');
    Route::put('admin/asp/update/{id}', [App\Http\Controllers\admin\AspController::class, 'update'])->name('asp_update');
    Route::get('admin/asp/delete/{id}', [App\Http\Controllers\admin\AspController::class, 'delete'])->name('asp_delete');

    // Valuations Routes
    Route::post('admin/valuation/store', [App\Http\Controllers\admin\ValuationController::class, 'store'])->name('valuation_store');
    Route::put('admin/valuation/update/{id}', [App\Http\Controllers\admin\ValuationController::class, 'update'])->name('valuation_update');
    Route::get('admin/valuation/delete/{id}', [App\Http\Controllers\admin\ValuationController::class, 'delete'])->name('valuation_delete');

    // AwardTitle Routes
    Route::post('admin/awardtitle/store', [App\Http\Controllers\admin\AwardtitleController::class, 'store'])->name('awardtitle_store');
    Route::put('admin/awardtitle/update/{id}', [App\Http\Controllers\admin\AwardtitleController::class, 'update'])->name('awardtitle_update');
    Route::get('admin/awardtitle/delete/{id}', [App\Http\Controllers\admin\AwardtitleController::class, 'delete'])->name('awardtitle_delete');

    //Form No. 1 Routes
    Route::get('admin/form1/generateform/{id}', [App\Http\Controllers\admin\Form1Controller::class, 'generateform'])->name('form1_generate');
    Route::get('admin/form1/uploadform/{id}', [App\Http\Controllers\admin\Form1Controller::class, 'uploadForm1'])->name('form1_upload');
    Route::post('admin/form1/adduploadfile', [App\Http\Controllers\admin\Form1Controller::class, 'addfile'])->name('addfile_form1');
    Route::put('admin/form1/updateuploadfile/{id}', [App\Http\Controllers\admin\Form1Controller::class, 'updatefile'])->name('updatefile_form1');
    Route::get('admin/form1/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form1Controller::class, 'deletefile'])->name('deletefile_form1');
    Route::get('admin/download_form1/{id}', [App\Http\Controllers\admin\Form1Controller::class, 'filedownload'])->name('filedownload_form1');


    //Form No. 2 Routes
    Route::get('admin/form2/generateform/{id}', [App\Http\Controllers\admin\Form2Controller::class, 'generateform'])->name('form2_generate');
    Route::get('admin/form2/uploadform/{id}', [App\Http\Controllers\admin\Form2Controller::class, 'uploadForm2'])->name('form2_upload');
    Route::post('admin/form2/adduploadfile', [App\Http\Controllers\admin\Form2Controller::class, 'addfile'])->name('addfile_form2');
    Route::put('admin/form2/updateuploadfile/{id}', [App\Http\Controllers\admin\Form2Controller::class, 'updatefile'])->name('updatefile_form2');
    Route::get('admin/form2/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form2Controller::class, 'deletefile'])->name('deletefile_form2');
    Route::get('admin/download_form2/{id}', [App\Http\Controllers\admin\Form2Controller::class, 'filedownload'])->name('filedownload_form2');

    //Form No. 3 Routes
    Route::get('admin/form3/generateform/{id}', [App\Http\Controllers\admin\Form3Controller::class, 'generateform'])->name('form3_generate');
    Route::get('admin/form3/uploadform/{id}', [App\Http\Controllers\admin\Form3Controller::class, 'uploadForm3'])->name('form3_upload');
    Route::post('admin/form3/adduploadfile', [App\Http\Controllers\admin\Form3Controller::class, 'addfile'])->name('addfile_form3');
    Route::put('admin/form3/updateuploadfile/{id}', [App\Http\Controllers\admin\Form3Controller::class, 'updatefile'])->name('updatefile_form3');
    Route::get('admin/form3/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form3Controller::class, 'deletefile'])->name('deletefile_form3');
    Route::get('admin/download_form3/{id}', [App\Http\Controllers\admin\Form3Controller::class, 'filedownload'])->name('filedownload_form3');

    //form No. 10 Routes
    Route::get('admin/form10/generateform/{id}', [App\Http\Controllers\admin\Form10Controller::class, 'generateform'])->name('form10_generate');
    Route::get('admin/form10/uploadform/{id}', [App\Http\Controllers\admin\Form10Controller::class, 'uploadForm10'])->name('form10_upload');
    Route::post('admin/form10/adduploadfile', [App\Http\Controllers\admin\Form10Controller::class, 'addfile'])->name('addfile_form10');
    Route::put('admin/form10/updateuploadfile/{id}', [App\Http\Controllers\admin\Form10Controller::class, 'updatefile'])->name('updatefile_form10');
    Route::get('admin/form10/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form10Controller::class, 'deletefile'])->name('deletefile_form10');

    //form No. 11 Routes
    Route::get('admin/form11/generateform/{id}', [App\Http\Controllers\admin\Form11Controller::class, 'generateform'])->name('form11_generate');
    Route::get('admin/form11/uploadform/{id}', [App\Http\Controllers\admin\Form11Controller::class, 'uploadForm11'])->name('form11_upload');
    Route::post('admin/form11/adduploadfile', [App\Http\Controllers\admin\Form11Controller::class, 'addfile'])->name('addfile_form11');
    Route::put('admin/form11/updateuploadfile/{id}', [App\Http\Controllers\admin\Form11Controller::class, 'updatefile'])->name('updatefile_form11');
    Route::get('admin/form11/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form11Controller::class, 'deletefile'])->name('deletefile_form11');

    //Form No. 18 Routes
    Route::get('admin/form18/generateform/{id}', [App\Http\Controllers\admin\Form18Controller::class, 'generateform'])->name('form18_generate');
    Route::get('admin/form18/uploadform/{id}', [App\Http\Controllers\admin\Form18Controller::class, 'uploadForm18'])->name('form18_upload');
    Route::post('admin/form18/adduploadfile', [App\Http\Controllers\admin\Form18Controller::class, 'addfile'])->name('addfile_form18');
    Route::put('admin/form18/updateuploadfile/{id}', [App\Http\Controllers\admin\Form18Controller::class, 'updatefile'])->name('updatefile_form18');
    Route::get('admin/form18/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form18Controller::class, 'deletefile'])->name('deletefile_form18');
    Route::get('admin/download_form18/{id}', [App\Http\Controllers\admin\Form18Controller::class, 'filedownload'])->name('filedownload_form18');

    //Form No. 20 Routes
    Route::get('admin/form20/generateform/{id}', [App\Http\Controllers\admin\Form20Controller::class, 'generateform'])->name('form20_generate');
    Route::get('admin/form20/uploadform/{id}', [App\Http\Controllers\admin\Form20Controller::class, 'uploadForm20'])->name('form20_upload');
    Route::post('admin/form20/adduploadfile', [App\Http\Controllers\admin\Form20Controller::class, 'addfile'])->name('addfile_form20');
    Route::put('admin/form20/updateuploadfile/{id}', [App\Http\Controllers\admin\Form20Controller::class, 'updatefile'])->name('updatefile_form20');
    Route::get('admin/form20/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form20Controller::class, 'deletefile'])->name('deletefile_form20');
    Route::get('admin/download_form20/{id}', [App\Http\Controllers\admin\Form20Controller::class, 'filedownload'])->name('filedownload_form20');
    //Form No. 42 Routes
    Route::get('admin/form42/generateform/{id}', [App\Http\Controllers\admin\Form42Controller::class, 'generateform'])->name('form42_generate');
    Route::get('admin/form42/uploadform/{id}', [App\Http\Controllers\admin\Form42Controller::class, 'uploadForm42'])->name('form42_upload');
    Route::post('admin/form42/adduploadfile', [App\Http\Controllers\admin\Form42Controller::class, 'addfile'])->name('addfile_form42');
    Route::put('admin/form42/updateuploadfile/{id}', [App\Http\Controllers\admin\Form42Controller::class, 'updatefile'])->name('updatefile_form42');
    Route::get('admin/form42/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form42Controller::class, 'deletefile'])->name('deletefile_form42');
    Route::get('admin/download_form42/{id}', [App\Http\Controllers\admin\Form42Controller::class, 'filedownload'])->name('filedownload_form42');
    //Form No. 46 Routes
    Route::get('admin/form46/generateform/{id}', [App\Http\Controllers\admin\Form46Controller::class, 'generateform'])->name('form46_generate');
    Route::get('admin/form46/uploadform/{id}', [App\Http\Controllers\admin\Form46Controller::class, 'uploadForm46'])->name('form46_upload');
    Route::post('admin/form46/adduploadfile', [App\Http\Controllers\admin\Form46Controller::class, 'addfile'])->name('addfile_form46');
    Route::put('admin/form46/updateuploadfile/{id}', [App\Http\Controllers\admin\Form46Controller::class, 'updatefile'])->name('updatefile_form46');
    Route::get('admin/form46/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form46Controller::class, 'deletefile'])->name('deletefile_form46');
    Route::get('admin/download_form46/{id}', [App\Http\Controllers\admin\Form46Controller::class, 'filedownload'])->name('filedownload_form46');
    //Form No. 49 Routes
    Route::get('admin/form49/generateform/{id}', [App\Http\Controllers\admin\Form49Controller::class, 'generateform'])->name('form49_generate');
    Route::get('admin/form49/uploadform/{id}', [App\Http\Controllers\admin\Form49Controller::class, 'uploadForm49'])->name('form49_upload');
    Route::post('admin/form49/adduploadfile', [App\Http\Controllers\admin\Form49Controller::class, 'addfile'])->name('addfile_form49');
    Route::put('admin/form49/updateuploadfile/{id}', [App\Http\Controllers\admin\Form49Controller::class, 'updatefile'])->name('updatefile_form49');
    Route::get('admin/form49/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form49Controller::class, 'deletefile'])->name('deletefile_form49');
    Route::get('admin/download_form49/{id}', [App\Http\Controllers\admin\Form49Controller::class, 'filedownload'])->name('filedownload_form49');
    //Form No. 37 Routes
    Route::get('admin/form37/generateform/{id}', [App\Http\Controllers\admin\Form37Controller::class, 'generateform'])->name('form37_generate');
    Route::get('admin/form37/uploadform/{id}', [App\Http\Controllers\admin\Form37Controller::class, 'uploadForm37'])->name('form37_upload');
    Route::post('admin/form37/adduploadfile', [App\Http\Controllers\admin\Form37Controller::class, 'addfile'])->name('addfile_form37');
    Route::put('admin/form37/updateuploadfile/{id}', [Form37Controller::class, 'updatefile'])->name('updatefile_form37');
    Route::get('admin/form37/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form37Controller::class, 'deletefile'])->name('deletefile_form37');
    Route::get('admin/download_form37/{id}', [App\Http\Controllers\admin\Form37Controller::class, 'filedownload'])->name('filedownload_form37');
    //Form No. 47 Routes
    Route::get('admin/form47/generateform/{id}', [App\Http\Controllers\admin\Form47Controller::class, 'generateform'])->name('form47_generate');
    Route::get('admin/form47/uploadform/{id}', [App\Http\Controllers\admin\Form47Controller::class, 'uploadForm47'])->name('form47_upload');
    Route::post('admin/form47/adduploadfile', [App\Http\Controllers\admin\Form47Controller::class, 'addfile'])->name('addfile_form47');
    Route::put('admin/form47/updateuploadfile/{id}', [App\Http\Controllers\admin\Form47Controller::class, 'updatefile'])->name('updatefile_form47');
    Route::get('admin/form47/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form47Controller::class, 'deletefile'])->name('deletefile_form47');
    Route::get('admin/download_form47/{id}', [App\Http\Controllers\admin\Form47Controller::class, 'filedownload'])->name('filedownload_form47');
    //Form No. 54 Routes
    Route::get('admin/form54/generateform/{id}', [App\Http\Controllers\admin\Form54Controller::class, 'generateform'])->name('form54_generate');
    Route::get('admin/form54/uploadform/{id}', [App\Http\Controllers\admin\Form54Controller::class, 'uploadForm54'])->name('form54_upload');
    Route::post('admin/form54/adduploadfile', [App\Http\Controllers\admin\Form54Controller::class, 'addfile'])->name('addfile_form54');
    Route::put('admin/form54/updateuploadfile/{id}', [App\Http\Controllers\admin\Form54Controller::class, 'updatefile'])->name('updatefile_form54');
    Route::get('admin/form54/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form54Controller::class, 'deletefile'])->name('deletefile_form54');
    Route::get('admin/download_form54/{id}', [App\Http\Controllers\admin\Form54Controller::class, 'filedownload'])->name('filedownload_form54');
    //Form No. 51 Routes
    Route::get('admin/form51/generateform/{id}', [App\Http\Controllers\admin\Form51Controller::class, 'generateform'])->name('form51_generate');
    Route::get('admin/form51/uploadform/{id}', [App\Http\Controllers\admin\Form51Controller::class, 'uploadForm51'])->name('form51_upload');
    Route::post('admin/form51/adduploadfile', [App\Http\Controllers\admin\Form51Controller::class, 'addfile'])->name('addfile_form51');
    Route::put('admin/form51/updateuploadfile/{id}', [App\Http\Controllers\admin\Form51Controller::class, 'updatefile'])->name('updatefile_form51');
    Route::get('admin/form51/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form51Controller::class, 'deletefile'])->name('deletefile_form51');
    Route::get('admin/download_form51/{id}', [App\Http\Controllers\admin\Form51Controller::class, 'filedownload'])->name('filedownload_form51');
    //Form No. 52B Routes
    Route::get('admin/form52B/generateform/{id}', [App\Http\Controllers\admin\Form52BController::class, 'generateform'])->name('form52B_generate');
    Route::get('admin/form52B/uploadform/{id}', [App\Http\Controllers\admin\Form52BController::class, 'uploadForm52B'])->name('form52B_upload');
    Route::post('admin/form52B/adduploadfile', [App\Http\Controllers\admin\Form52BController::class, 'addfile'])->name('addfile_form52B');
    Route::put('admin/form52B/updateuploadfile/{id}', [App\Http\Controllers\admin\Form52BController::class, 'updatefile'])->name('updatefile_form52B');
    Route::get('admin/form52B/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form52BController::class, 'deletefile'])->name('deletefile_form52B');
    Route::get('admin/download_form52B/{id}', [App\Http\Controllers\admin\Form52Controller::class, 'filedownload'])->name('filedownload_form52');
    //Form No. 53 Routes
    Route::get('admin/form53/generateform/{id}', [App\Http\Controllers\admin\Form53Controller::class, 'generateform'])->name('form53_generate');
    Route::get('admin/form53/uploadform/{id}', [App\Http\Controllers\admin\Form53Controller::class, 'uploadForm53'])->name('form53_upload');
    Route::post('admin/form53/adduploadfile', [App\Http\Controllers\admin\Form53Controller::class, 'addfile'])->name('addfile_form53');
    Route::put('admin/form53/updateuploadfile/{id}', [App\Http\Controllers\admin\Form53Controller::class, 'updatefile'])->name('updatefile_form53');
    Route::get('admin/form53/deleteuploadedfile/{id}', [App\Http\Controllers\admin\Form53Controller::class, 'deletefile'])->name('deletefile_form53');
    Route::get('admin/download_form53/{id}', [App\Http\Controllers\admin\Form53Controller::class, 'filedownload'])->name('filedownload_form53');
    //Upload Generated File
    Route::post('admin/UploadFile/store', [App\Http\Controllers\admin\GeneratedFileController::class, 'store'])->name('file_store');
    Route::put('admin/UploadFile/update/{id}', [App\Http\Controllers\admin\GeneratedFileController::class, 'update'])->name('file_update');
    Route::get('admin/UploadFile/delete/{id}', [App\Http\Controllers\admin\GeneratedFileController::class, 'delete'])->name('file_delete');

});

//Staff Routes List
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffHome'])->name('staff.home');

     //Landholding Routes
     Route::get('staff/landholding', [App\Http\Controllers\staff\LandholdingController::class, 'index'])->name('staff_landholding');
     Route::get('staff/download_title/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'downloadtitle'])->name('staff_download_title');
     Route::get('staff/download_taxDec/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'downloadtaxDec'])->name('staff_download_taxDec');
     Route::get('staff/landholding/view/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'show'])->name('staff_landholding_view');
    
    //Form No. 1 Routes
    Route::get('staff/form1/generateform/{id}', [App\Http\Controllers\staff\Form1Controller::class, 'generateform'])->name('staff_form1_generate');
    Route::get('staff/form1/uploadform/{id}', [App\Http\Controllers\staff\Form1Controller::class, 'uploadForm1'])->name('staff_form1_upload');
    Route::get('staff/download_form1/{id}', [App\Http\Controllers\staff\Form1Controller::class, 'filedownload'])->name('staff_filedownload_form1');
    //Form No. 2 Routes
    Route::get('staff/form2/generateform/{id}', [App\Http\Controllers\staff\Form2Controller::class, 'generateform'])->name('staff_form2_generate');
    Route::get('staff/form2/uploadform/{id}', [App\Http\Controllers\staff\Form2Controller::class, 'uploadForm2'])->name('staff_form2_upload');
    Route::get('staff/download_form2/{id}', [App\Http\Controllers\staff\Form2Controller::class, 'filedownload'])->name('staff_filedownload_form2');
    //Form No. 3 Routes
    Route::get('staff/form3/generateform/{id}', [App\Http\Controllers\staff\Form3Controller::class, 'generateform'])->name('staff_form3_generate');
    Route::get('staff/form3/uploadform/{id}', [App\Http\Controllers\staff\Form3Controller::class, 'uploadForm3'])->name('staff_form3_upload');
    Route::get('staff/download_form3/{id}', [App\Http\Controllers\staff\Form3Controller::class, 'filedownload'])->name('staff_filedownload_form3');
    //Form No. 18 Routes
    Route::get('staff/form18/generateform/{id}', [App\Http\Controllers\staff\Form18Controller::class, 'generateform'])->name('staff_form18_generate');
    Route::get('staff/form18/uploadform/{id}', [App\Http\Controllers\staff\Form18Controller::class, 'uploadForm18'])->name('staff_form18_upload');
    Route::get('staff/download_form18/{id}', [App\Http\Controllers\staff\Form18Controller::class, 'filedownload'])->name('staff_filedownload_form18');
    //Form No. 20 Routes
    Route::get('staff/form20/generateform/{id}', [App\Http\Controllers\staff\Form20Controller::class, 'generateform'])->name('staff_form20_generate');
    Route::get('staff/form20/uploadform/{id}', [App\Http\Controllers\staff\Form20Controller::class, 'uploadForm20'])->name('staff_form20_upload');
    Route::get('staff/download_form20/{id}', [App\Http\Controllers\staff\Form20Controller::class, 'filedownload'])->name('staff_filedownload_form20');
    //Form No. 42 Routes
    Route::get('staff/form42/generateform/{id}', [App\Http\Controllers\staff\Form42Controller::class, 'generateform'])->name('staff_form42_generate');
    Route::get('staff/form42/uploadform/{id}', [App\Http\Controllers\staff\Form42Controller::class, 'uploadForm42'])->name('staff_form42_upload');
    Route::get('staff/download_form42/{id}', [App\Http\Controllers\staff\Form42Controller::class, 'filedownload'])->name('staff_filedownload_form42');
    //Form No. 46 Routes
    Route::get('staff/form46/generateform/{id}', [App\Http\Controllers\staff\Form46Controller::class, 'generateform'])->name('staff_form46_generate');
    Route::get('staff/form46/uploadform/{id}', [App\Http\Controllers\staff\Form46Controller::class, 'uploadForm46'])->name('staff_form46_upload');
    Route::get('staff/download_form46/{id}', [App\Http\Controllers\staff\Form46Controller::class, 'filedownload'])->name('staff_filedownload_form46');
    //Form No. 49 Routes
    Route::get('staff/form49/generateform/{id}', [App\Http\Controllers\staff\Form49Controller::class, 'generateform'])->name('staff_form49_generate');
    Route::get('staff/form49/uploadform/{id}', [App\Http\Controllers\staff\Form49Controller::class, 'uploadForm49'])->name('staff_form49_upload');
    Route::get('staff/download_form49/{id}', [App\Http\Controllers\staff\Form49Controller::class, 'filedownload'])->name('staff_filedownload_form49');
    //Form No. 37 Routes
    Route::get('staff/form37/generateform/{id}', [App\Http\Controllers\staff\Form37Controller::class, 'generateform'])->name('staff_form37_generate');
    Route::get('staff/form37/uploadform/{id}', [App\Http\Controllers\staff\Form37Controller::class, 'uploadForm37'])->name('staff_form37_upload');
    Route::get('staff/download_form37/{id}', [App\Http\Controllers\staff\Form37Controller::class, 'filedownload'])->name('staff_filedownload_form37');
    //Form No. 47 Routes
    Route::get('staff/form47/generateform/{id}', [App\Http\Controllers\staff\Form47Controller::class, 'generateform'])->name('staff_form47_generate');
    Route::get('staff/form47/uploadform/{id}', [App\Http\Controllers\staff\Form47Controller::class, 'uploadForm47'])->name('staff_form47_upload');
    Route::get('staff/download_form47/{id}', [App\Http\Controllers\staff\Form47Controller::class, 'filedownload'])->name('staff_filedownload_form47');
    //Form No. 54 Routes
    Route::get('staff/form54/generateform/{id}', [App\Http\Controllers\staff\Form54Controller::class, 'generateform'])->name('staff_form54_generate');
    Route::get('staff/form54/uploadform/{id}', [App\Http\Controllers\staff\Form54Controller::class, 'uploadForm54'])->name('staff_form54_upload');
    Route::get('staff/download_form54/{id}', [App\Http\Controllers\staff\Form54Controller::class, 'filedownload'])->name('staff_filedownload_form54');
    //Form No. 51 Routes
    Route::get('staff/form51/generateform/{id}', [App\Http\Controllers\staff\Form51Controller::class, 'generateform'])->name('staff_form51_generate');
    Route::get('staff/form51/uploadform/{id}', [App\Http\Controllers\staff\Form51Controller::class, 'uploadForm51'])->name('staff_form51_upload');
    Route::get('staff/download_form51/{id}', [App\Http\Controllers\staff\Form51Controller::class, 'filedownload'])->name('staff_filedownload_form51');
    //Form No. 52B Routes
    Route::get('staff/form52B/generateform/{id}', [App\Http\Controllers\staff\Form52BController::class, 'generateform'])->name('staff_form52B_generate');
    Route::get('staff/form52B/uploadform/{id}', [App\Http\Controllers\staff\Form52BController::class, 'uploadForm52B'])->name('staff_form52B_upload');
    Route::get('staff/download_form52B/{id}', [App\Http\Controllers\staff\Form52BController::class, 'filedownload'])->name('staff_filedownload_form52B');
    //Form No. 53 Routes
    Route::get('staff/form53/generateform/{id}', [App\Http\Controllers\staff\Form53Controller::class, 'generateform'])->name('staff_form53_generate');
    Route::get('staff/form53/uploadform/{id}', [App\Http\Controllers\staff\Form53Controller::class, 'uploadForm53'])->name('staff_form53_upload');
    Route::get('staff/download_form53/{id}', [App\Http\Controllers\staff\Form53Controller::class, 'filedownload'])->name('staff_filedownload_form53');
});
