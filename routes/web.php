<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Seller\ProfileController as SellerProfileController;
use App\Http\Controllers\Seller\BuyerController as SellerBuyerController;
use App\Http\Controllers\Seller\InvoiceController as SellerInvoiceController;


Route::middleware(['auth'])->group(function () {

    //Seller Routes

    Route::middleware(['seller'])->group(function () {

        //  Menu
        Route::redirect('', 'tax-invoice');
        Route::view('simplified-invoice', 'seller.invoices.simplified_invoice')->name('seller.view.simplified-invoice');
        Route::view('invoices', 'seller.invoices.invoices')->name('seller.view.invoices');
        
        Route::get('tax-invoice', [SellerInvoiceController::class, 'view_tax_invoice'])->name('seller.view.tax-invoice');

        //  Invoices
        Route::post('generate-invoice', [SellerInvoiceController::class, 'generate_invoice'])->name('seller.generate_invoice');

        //  Buyers
    
        //    All Buyers
        Route::get('buyers', [SellerBuyerController::class, 'view_buyers'])->name('seller.view.buyers');
    
        //    Buyers Profile details
        Route::get('buyer-profile-details', [SellerBuyerController::class, 'view_profile'])->name('seller.view.buyer-profile-details');
        Route::post('buyer-profile-details', [SellerBuyerController::class, 'create_or_update_profile'])->name('seller.create-or-update.buyer-profile-details');
        Route::post('delete-buyer', [SellerBuyerController::class, 'delete_buyer'])->name('seller.delete-buyer');
  
    });


    //  Profile
    Route::get('profile-details', [SellerProfileController::class, 'view_profile'])->name('seller.view.profile-details');
    Route::post('profile-details', [SellerProfileController::class, 'update_profile'])->name('seller.update.profile-details');

    //  Bank Details
    Route::get('bank-details', [SellerProfileController::class, 'view_bank_details'])->name('seller.view.bank-details');
    Route::post('bank-details', [SellerProfileController::class, 'create_or_update_bank_details'])->name('seller.create-or-update.bank-details');

});

// This route is triggered only after registration is complete. Once and never after that.
Route::get('thank-you', function () {
    return view('auth.awaiting_account_activation');
})->name('thank-you');

Auth::routes();
