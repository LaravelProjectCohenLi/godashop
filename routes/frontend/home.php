<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });
Route::get('add-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('dat-hang.html', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.process');
Route::view('chinh-sach-doi-tra.html', 'frontend.policies.return_back')->name('policies.return_back');
Route::view('chinh-sach-thanh-toan.html', 'frontend.policies.payment_policy')->name('policies.payment_policy');
Route::view('chinh-sach-giao-hang.html', 'frontend.policies.shipping_back')->name('policies.shipping_back');
Route::get('san-pham.html', [ProductController::class, 'index'])->name('product.index');
Route::get('{slug}_{categoryId}.html', [CategoryController::class, 'show'])->name('category.show');
Route::get('{slug}.html', [ProductController::class, 'show'])->name('product.show');

