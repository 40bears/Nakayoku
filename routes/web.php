<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IdVerificationController;
use App\Http\Controllers\InterestedProductController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\WithdrawalRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/search', [AuthController::class, 'dashboardSearch'])->name('dashboard-search');

Route::get('page/{url_slug}', [PageController::class, 'viewPageDetails'])->name('view-page-details');
Route::get('page/{parent_url_slug}/{url_slug}', [PageController::class, 'viewPageDetailsParent'])->name('view-page-details-parent');

Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('contact-thanks', [ContactController::class, 'submitContact'])->name('submit-contact-post');
Route::get('contact-thanks', [ContactController::class, 'submitContact'])->name('contact-thanks');

Route::get('not-found', [PageController::class, 'notFound'])->name('not-found');

Route::get('games', [GameController::class, 'allGames'])->name('all-games');
Route::get('games/device/{device}', [GameController::class, 'allGamesByDevice'])->name('all-games-by-device');

Route::get('game/{id}', [ProductController::class, 'viewProducts'])->name('view-products');
Route::get('game/{id}/search', [ProductController::class, 'viewProductsSearch'])->name('view-products-search');
Route::get('game/{id}/product-type/{type}', [ProductController::class, 'viewProductsType'])->name('view-products-type');
Route::get('game/{id}/game-details/{product_name}', [ProductController::class, 'viewProductDetails'])->name('view-product-details');

Route::get('about-us', [AboutUsController::class, 'viewAboutUsPage'])->name('about-us');
Route::get('terms-and-conditions', [AboutUsController::class, 'viewTermsAndConditions'])->name('terms-and-conditions');
Route::get('privacy-policy', [AboutUsController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('user-guide', [AboutUsController::class, 'userGuide'])->name('user-guide');

Route::get('user-guide/{category}/{page}', [PageController::class, 'viewPage'])->name('view-page');

Route::post('change-base-currency', [UserController::class, 'changeBaseCurrency'])->name('change-base-currency');

Route::get('rate-purchase', [ProductController::class, 'viewRatingPage'])->name('rate-purchase');
Route::post('rate-purchase', [ProductController::class, 'viewRatingPage'])->name('rate-purchase-post');

Route::get('autocomplete-search', [TypeaheadController::class, 'action'])->name('autocomplete-search');
Route::get('autocomplete-search-users', [TypeaheadController::class, 'searchUsers'])->name('autocomplete-search-users');

Route::get('payment-complete-notification', [AdminController::class, 'paymentCompleteNotification'])->name('payment-complete-notification');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('login-password', [AuthController::class, 'loginPassword'])->name('login-password');
    Route::post('login', [AuthController::class, 'login'])->name('login-post');

    Route::get('signup', [AuthController::class, 'signupView'])->name('signup1');
    Route::post('signup', [AuthController::class, 'signupEnterEmail'])->name('signup1-post');

    Route::get('signup-sent', [AuthController::class, 'signUpCheckMail'])->name('signup2');
    Route::get('signup-confirmation', [AuthController::class, 'signupVerifyEmail'])->name('signupVerifyEmail');

    Route::post('user-kyc', [AuthController::class, 'userKyc'])->name('user-kyc');

    Route::get('submit-password-view', [AuthController::class, 'storePasswordView'])->name('store-password-view');
    Route::post('submit-password', [AuthController::class, 'storePassword'])->name('store-password');

    Route::get('forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgot-password');
    Route::post('forgot-password', [AuthController::class, 'forgotPasswordLink'])->name('forgot-password-post');

    Route::get('forgot-password-sent', [AuthController::class, 'forgotPasswordCheckMail'])->name('forgot-password-mail-sent');
    Route::get('forgot-password-confirmation', [AuthController::class, 'forgotPasswordConfirmation'])->name('forgot-password-confirmation');
    Route::post('change-password', [AuthController::class, 'changePassword'])->name('change-password');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'mypage'], function () {
        Route::get('/', [UserController::class, 'viewMyPage'])->name('view-my-page');
        Route::post('update-my-page', [UserController::class, 'updateMyPage'])->name('update-my-page');

        Route::get('bank-info', [UserController::class, 'viewBankDetails'])->name('view-bank-details');
        Route::post('bank-info', [UserController::class, 'viewBankDetails'])->name('update-bank-details');

        Route::get('password-details', [UserController::class, 'viewPasswordDetails'])->name('view-password-details');
        Route::post('password-details', [UserController::class, 'viewPasswordDetails'])->name('update-password-details');

        Route::get('personal-info', [UserController::class, 'personalInfo'])->name('view-personal-info');
        Route::post('personal-info', [UserController::class, 'personalInfo'])->name('update-personal-info');

        Route::get('identity-verification', [UserController::class, 'identityVerification'])->name('identity-verification');
        Route::get('identity-verification-document/{id}', [UserController::class, 'identityVerificationDocument'])->name('identity-verification-document');
        Route::post('identity-verification-document/{id}', [UserController::class, 'identityVerificationDocument'])->name('identity-verification-document-post');
        Route::get('identity-verification-confirm', [UserController::class, 'identityVerificationConfirm'])->name('identity-verification-confirm');

        Route::get('purchased-products', [ProductController::class, 'viewPurchasedProducts'])->name('view-purchased-products');
        Route::get('purchased-product-details/{id}', [ProductController::class, 'viewPurchasedProductDetails'])->name('view-purchased-products-details');

        Route::get('currently-on-display', [ProductController::class, 'currentlyOnDisplay'])->name('currently-on-display');
        Route::get('sold-products', [ProductController::class, 'viewSoldProducts'])->name('view-sold-products');

        Route::get('withdrawal-request', [WithdrawalRequestController::class, 'withdrawalRequest'])->name('withdrawal-request');
        Route::post('withdrawal-request', [WithdrawalRequestController::class, 'withdrawalRequest'])->name('withdrawal-request-post');

        Route::get('withdrawal-request-history', [WithdrawalRequestController::class, 'withdrawalRequestHistory'])->name('withdrawal-request-history');

        Route::get('view-interested-products', [InterestedProductController::class, 'viewInterestedProducts'])->name('view-interested-products');

        Route::get('add-interested-products/{id}', [InterestedProductController::class, 'addInterestedProducts'])->name('add-interested-products');
        Route::get('delete-interested-products/{id}', [InterestedProductController::class, 'deleteInterestedProducts'])->name('delete-interested-products');

        Route::get('sales-and-deposits', [ProductController::class, 'salesAndDeposits'])->name('sales-and-deposits');

        Route::get('view-draft', [ProductController::class, 'viewDraftProducts'])->name('view-draft-products');

        Route::get('notifications', [NotificationController::class, 'viewNotifications'])->name('notifications');

        Route::get('profile-page/{id}', [ProfileController::class, 'viewProfilePage'])->name('profile-page');
        Route::get('profile-page/{id}/type/{type}', [ProfileController::class, 'viewProfilePageProductTypes'])->name('profile-page-product-type');
        Route::post('profile-page/{id}/search', [ProfileController::class, 'viewProfilePageSearchProducts'])->name('profile-page-search-products');
    });

    Route::get('games/add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('games/add-product', [ProductController::class, 'addProduct'])->name('add-product-post');
    Route::post('games/add-product/draft', [ProductController::class, 'addProductDraft'])->name('add-product-draft-post');
    Route::get('update-product-status/{id}', [ProductController::class, 'updateProductStatus'])->name('update-product-status');
    Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product-post');

    Route::post('buy/{id}', [ProductController::class, 'buyProduct'])->name('buy-product');
    // Route::post('buy-confirmation/{id}', [ProductController::class, 'buyProductConfirmation'])->name('buy-product-confirmation');
    Route::get('buy-confirmation/{id}', [ProductController::class, 'buyProductConfirmation'])->name('buy-product-confirmation');
    Route::get('purchase-completed', [ProductController::class, 'buyProductThanks'])->name('buy-product-thanks');

    Route::group(['middleware' => 'access', "prefix" => "admin"], function () {
        Route::get('pages', [PageController::class, 'list'])->name('view-pages');
        Route::get('add-page', [PageController::class, 'addPage'])->name('add-page-view');
        Route::post('add-page', [PageController::class, 'addPage'])->name('add-page-post');

        Route::get('edit-page/{id}', [PageController::class, 'editPage'])->name('edit-page');
        Route::post('update-page/{id}', [PageController::class, 'updatePage'])->name('update-page');
        Route::get('delete-page/{id}', [PageController::class, 'deletePage'])->name('delete-page');

        Route::get('view-games', [GameController::class, 'viewGames'])->name('view-games');
        Route::post('view-games/search', [GameController::class, 'viewGamesSearch'])->name('view-games-post');
        Route::get('games/add-game', [GameController::class, 'addGame'])->name('add-game');
        Route::post('games/add-game', [GameController::class, 'addGame'])->name('add-game-post');
        Route::get('edit-game/{id}', [GameController::class, 'editGame'])->name('edit-game');
        Route::post('update-game/{id}', [GameController::class, 'updateGame'])->name('update-game');
        Route::get('delete-game/{id}', [GameController::class, 'deleteGame'])->name('delete-game');
        Route::get('update-game-status/{id}', [GameController::class, 'updateGameStatus'])->name('update-game-status');

        Route::get('id-approvals', [IdVerificationController::class, 'viewIdApprovals'])->name('id-approvals');
        Route::post('id-approvals/search', [IdVerificationController::class, 'viewIdApprovalsSearch'])->name('id-approvals-search');
        Route::get('id-approval-document/{id}', [IdVerificationController::class, 'viewIdApprovalDocument'])->name('id-approval-document');
        Route::get('id-approval-status/{id}/{approval}', [IdVerificationController::class, 'updateIdApprovalStatus'])->name('id-approval-status');

        Route::get('cii-bank-accounts', [AdminController::class, 'viewFelisBankAccounts'])->name('cii-bank-accounts');
        Route::get('add-cii-bank-account', [AdminController::class, 'addFelisBankAccount'])->name('add-cii-bank-account');
        Route::post('add-cii-bank-account', [AdminController::class, 'addFelisBankAccount'])->name('add-cii-bank-account-post');
        Route::get('edit-cii-bank-account/{id}', [AdminController::class, 'editFelisBankAccount'])->name('edit-cii-bank-account');
        Route::post('update-cii-bank-account/{id}', [AdminController::class, 'updateFelisBankAccount'])->name('update-cii-bank-account');
        Route::get('delete-cii-bank-account/{id}', [AdminController::class, 'deleteFelisBankAccount'])->name('delete-cii-bank-account');
        Route::get('change-default-cii-bank-account/{id}', [AdminController::class, 'changeDefaultFelisBankAccount'])->name('change-default-cii-bank-account');

        Route::get('notification-mmt', [AdminController::class, 'notificationList'])->name('notification-mmt');
        Route::post('send-notifications', [NotificationController::class, 'sendNotifications'])->name('send-notifications');

        Route::get('transactions-management', [AdminController::class, 'viewTransactions'])->name('transactions-management');
        Route::post('update-transaction-status/{id}', [AdminController::class, 'updateTransactionStatus'])->name('update-transaction-status');
        Route::get('withdraw-requests-management', [AdminController::class, 'viewWithdrawalRequests'])->name('withdraw-requests-management');
        Route::post('update-withdraw-requests-status/{id}', [AdminController::class, 'updateWithdrawRequestStatus'])->name('update-withdraw-requests-status');
    });
});
