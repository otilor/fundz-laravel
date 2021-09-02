<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PaymentLinkController;
use App\Http\Controllers\SafelockController;
use App\Http\Controllers\SavingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TransferController;

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
Route::get('/', [PageController::class,'home'])->name('home');
// Contact post route with name
Route::post('/send-contact', [PageController::class,'contact'])->name('contact.send');

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {

    // Email Verification Routes...
    Route::get('email/verify', [VerificationController::class,'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class,'resend'])->name('verification.resend');

    // Profile Routes Begins
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('PersonalInfomation', [ProfileController::class, 'updatePersonalInformation'])->name('updatePersonalInformation');
    Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    // Profile routes ends
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');

    // Referral Routes Begin
    Route::get('referral',[ReferralController::class,'index'])->name('referral');

    Route::get('/pay/{paymentHash}', [PaymentLinkController::class, 'resolve']);


    Route::get('request-payment/{affiliate_id}',[ReferralController::class, 'RequestPayment'])->name('request.pay');
    Route::middleware('verified')->group(function () {

        // Route::group(['middleware' => ['auth','verified']], function (){


        Route::group(['prefix' => 'safelock'], function () {
            Route::get('/', [SafelockController::class, 'index'])->name('safelock.index');
            Route::get('/create', [SafelockController::class, 'create'])->name('safelock.create');
            Route::post('/lock', [SafelockController::class, 'lock'])->name('safelock.lock');
        });

        Route::group(['prefix' => 'investment'], function () {
            Route::get('/', [InvestmentController::class, 'index']);
        });

        // Route::get('/send',[ProfileController::class,'send']);
        // Saving and Withdraw routes
        Route::get('savings', [SavingsController::class, 'index'])->name('savings');
        Route::post('savings', [SavingsController::class, 'save'])->name('savings');
        Route::get('withdraw', [SavingsController::class, 'withdraw'])->name('withdraw');
        Route::post('withdraw', [SavingsController::class, 'withdrawFundz'])->name('withdraw');
        Route::get('/rave/callback', [SavingsController::class, 'callback'])->name('callback');

         // Transfer Routes Begins
        Route::get('transfer',[TransferController::class, 'index'])->name('transfer');

        Route::post('transfer',[TransferController::class, 'transfer'])->name('transfer');

         // Transfer Routes end


        Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
        Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
        Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
        Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
        Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
        Route::get('post-page', [PageController::class, 'post'])->name('post');
        Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
        Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
        Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
        Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
        Route::get('users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
        Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
        Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
        Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
        Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
        Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
        Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
        Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
        Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
        Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
        Route::get('login-page', [PageController::class, 'login'])->name('login');
        Route::get('register-page', [PageController::class, 'register'])->name('register');
        Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
        Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
        Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
        Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
        Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
        Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
        Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
        Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
        Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
        Route::get('button-page', [PageController::class, 'button'])->name('button');
        Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
        Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
        Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
        Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
        Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
        Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
        Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
        Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
        Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
        Route::get('tail-select-page', [PageController::class, 'tailSelect'])->name('tail-select');
        Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
        Route::get('wysiwyg-editor-page', [PageController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
        Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
        Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
        Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
        Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');
    });
 });


Route::fallback(function () {
    return view('pages.404');
});
