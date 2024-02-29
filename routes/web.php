<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
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

//Homepage Routes
Route::get('/', [LandingPageController::class, 'home'])->name('home');
Route::get('about', [LandingPageController::class, 'about'])->name('about');
Route::get('darleaders', [LandingPageController::class, 'darleaders'])->name('darleaders');
Route::get('services', [LandingPageController::class, 'services'])->name('services');

Route::get('login', [HomeController::class, 'login'])->name('login');

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
    Route::get('admin/landholding/uploadedfile/{id}', [App\Http\Controllers\admin\LandholdingController::class, 'uploadedfile'])->name('uploaded_file');
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

    // Approved Routes
    Route::post('admin/approvedform/store', [App\Http\Controllers\admin\ApprovedFormController::class, 'store'])->name('approvedform_store');
    Route::put('admin/approvedform/update/{id}', [App\Http\Controllers\admin\ApprovedFormController::class, 'update'])->name('approvedform_update');
    Route::get('admin/approvedform/delete/{id}', [App\Http\Controllers\admin\ApprovedFormController::class, 'delete'])->name('approvedform_delete');
    Route::get('admin/approvedform/download/{id}', [App\Http\Controllers\admin\ApprovedFormController::class, 'filedownload'])->name('approvedform_download');
    
    // Generate Form Routes
    Route::get('admin/form1/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform1'])->name('form1_generate');
    Route::get('admin/form2/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform2'])->name('form2_generate');
    Route::get('admin/form3/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform3'])->name('form3_generate');
    Route::get('admin/form10/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform10'])->name('form10_generate');
    Route::get('admin/form11/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform11'])->name('form11_generate');
    Route::get('admin/form17/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform17'])->name('form17_generate');
    Route::get('admin/form42/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform42'])->name('form42_generate');
    Route::get('admin/form45A/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform45A'])->name('form45A_generate');
    Route::get('admin/form46/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform46'])->name('form46_generate');
    Route::get('admin/form49/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform49'])->name('form49_generate');
    Route::get('admin/form37/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform37'])->name('form37_generate');
    Route::get('admin/form47/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform47'])->name('form47_generate');
    Route::get('admin/form52A/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform52A'])->name('form52A_generate');
    Route::get('admin/form54/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform54'])->name('form54_generate');
    Route::get('admin/form51/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform51'])->name('form51_generate');
    Route::get('admin/form52B/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform52B'])->name('form52B_generate');
    Route::get('admin/form53/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform53'])->name('form53_generate');
    Route::get('admin/form57/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform57'])->name('form57_generate');
    Route::get('admin/form58/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform58'])->name('form58_generate');
    Route::get('admin/form59/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform59'])->name('form59_generate');
    Route::get('admin/form60/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform60'])->name('form60_generate');
    Route::get('admin/form61/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform61'])->name('form61_generate');
    Route::get('admin/form62/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform62'])->name('form62_generate');
    Route::get('admin/form63/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform63'])->name('form63_generate');
    Route::get('admin/form64/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform64'])->name('form64_generate');
    Route::get('admin/form65/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform65'])->name('form65_generate');
    Route::get('admin/form66/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform66'])->name('form66_generate');
    Route::get('admin/form67/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform67'])->name('form67_generate');
    Route::get('admin/form68/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform68'])->name('form68_generate');
    Route::get('admin/form68A/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform68A'])->name('form68A_generate');
    Route::get('admin/form68B/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform68B'])->name('form68B_generate');
    Route::get('admin/form69/generateform/{id}', [App\Http\Controllers\admin\GenerateFileController::class, 'generateform69'])->name('form69_generate');

});

//Staff Routes List
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffHome'])->name('staff.home');

     //Landholding Routes
     Route::get('staff/landholding', [App\Http\Controllers\staff\LandholdingController::class, 'index'])->name('staff_landholding');
     Route::get('staff/landholding/uploadedfile/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'uploadedfile'])->name('staff_uploaded_file');
     Route::get('staff/download_title/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'downloadtitle'])->name('staff_download_title');
     Route::get('staff/download_taxDec/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'downloadtaxDec'])->name('staff_download_taxDec');
     Route::get('staff/landholding/view/{id}', [App\Http\Controllers\staff\LandholdingController::class, 'show'])->name('staff_landholding_view');

    //  Download Approved Form Routes
    Route::get('staff/approvedform/download/{id}', [App\Http\Controllers\staff\DownloadApprovedFormController::class, 'filedownload'])->name('staff_approvedform_download');

    // Generate Form Routes
    Route::get('staff/form1/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform1'])->name('staff_form1_generate');
    Route::get('staff/form2/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform2'])->name('staff_form2_generate');
    Route::get('staff/form3/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform3'])->name('staff_form3_generate');
    Route::get('staff/form10/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform10'])->name('staff_form10_generate');
    Route::get('staff/form11/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform11'])->name('staff_form11_generate');
    Route::get('staff/form17/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform17'])->name('staff_form17_generate');
    Route::get('staff/form42/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform42'])->name('staff_form42_generate');
    Route::get('staff/form45A/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform45A'])->name('staff_form45A_generate');
    Route::get('staff/form46/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform46'])->name('staff_form46_generate');
    Route::get('staff/form49/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform49'])->name('staff_form49_generate');
    Route::get('staff/form37/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform37'])->name('staff_form37_generate');
    Route::get('staff/form47/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform47'])->name('staff_form47_generate');
    Route::get('staff/form52A/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform52A'])->name('staff_form52A_generate');
    Route::get('staff/form54/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform54'])->name('staff_form54_generate');
    Route::get('staff/form51/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform51'])->name('staff_form51_generate');
    Route::get('staff/form52B/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform52B'])->name('staff_form52B_generate');
    Route::get('staff/form53/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform53'])->name('staff_form53_generate');
    Route::get('staff/form57/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform57'])->name('staff_form57_generate');
    Route::get('staff/form58/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform58'])->name('staff_form58_generate');
    Route::get('staff/form59/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform59'])->name('staff_form59_generate');
    Route::get('staff/form60/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform60'])->name('staff_form60_generate');
    Route::get('staff/form61/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform61'])->name('staff_form61_generate');
    Route::get('staff/form62/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform62'])->name('staff_form62_generate');
    Route::get('staff/form63/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform63'])->name('staff_form63_generate');
    Route::get('staff/form64/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform64'])->name('staff_form64_generate');
    Route::get('staff/form65/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform65'])->name('staff_form65_generate');
    Route::get('staff/form66/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform66'])->name('staff_form66_generate');
    Route::get('staff/form67/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform67'])->name('staff_form67_generate');
    Route::get('staff/form68/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform68'])->name('staff_form68_generate');
    Route::get('staff/form68A/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform68A'])->name('staff_form68A_generate');
    Route::get('staff/form68B/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform68B'])->name('staff_form68B_generate');
    Route::get('staff/form69/generateform/{id}', [App\Http\Controllers\staff\GenerateFileController::class, 'generateform69'])->name('staff_form69_generate');
});