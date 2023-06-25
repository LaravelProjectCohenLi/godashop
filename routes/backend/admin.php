<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController; 
use App\Http\Controllers\Backend\PromotionController;
use App\Http\Controllers\Backend\ProductPromotionController;
use App\Http\Controllers\Backend\ControlPriceController;
use App\Http\Controllers\Backend\ExportController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
// Order management
Route::get('order', [OrderController::class, 'index'])
->name('order.index')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Order Management'), route('admin.order.index'));
});

Route::get('order/{id}', [OrderController::class, 'show'])
    ->name('order.show')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Order detail'), route('admin.order.index'));
        // $trail->push(__('Order detail'), route('admin.order.show', ['id' => request()->route('id')]));
    });

Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('order.delete');

// Tag management
Route::get('tag', [TagController::class, 'index'])
    ->name('tag.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Tag management'), route('admin.tag.index'));
    });

Route::get('tag/show/{id}', [TagController::class, 'show'])
->name('tag.show')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Tag detail'), route('admin.tag.index'));
});

Route::get('tag/create', [TagController::class, 'create'])
    ->name('tag.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Create tag'), route('admin.tag.index'));
    });

Route::post('tag/create', [TagController::class, 'store'])
    ->name('tag.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Store tag'), route('admin.tag.index'));
    });

Route::get('tag/edit/{id}', [TagController::class, 'edit'])
    ->name('tag.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Edit tag'), route('admin.tag.index'));
    });

Route::patch('tag/update/{id}', [TagController::class, 'update'])
    ->name('tag.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Update tag'), route('admin.tag.index'));
    });

Route::delete('tag/delete/{id}', [TagController::class, 'destroy'])
    ->name('tag.destroy');

// Category management
Route::get('category', [CategoryController::class, 'index'])
    ->name('category.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Category management'), route('admin.category.index'));
    });

Route::get('category/show/{id}', [CategoryController::class, 'show'])
->name('category.show')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Category detail'), route('admin.category.index'));
});

Route::get('category/create', [CategoryController::class, 'create'])
    ->name('category.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Create Category'), route('admin.category.index'));
    });

Route::post('category/create', [CategoryController::class, 'store'])
    ->name('category.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Store Category'), route('admin.category.index'));
    });

Route::get('category/edit/{id}', [CategoryController::class, 'edit'])
    ->name('category.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Edit Category'), route('admin.category.index'));
    });

Route::patch('category/update/{id}', [CategoryController::class, 'update'])
    ->name('category.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Update Category'), route('admin.category.index'));
    });

Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('category.destroy');

// Product management
Route::get('product', [ProductController::class, 'index'])
    ->name('product.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Product management'), route('admin.product.index'));
    });

Route::get('product/show/{id}', [ProductController::class, 'show'])
->name('product.show')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Product detail'), route('admin.product.index'));
});

Route::get('product/create', [ProductController::class, 'create'])
    ->name('product.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Create Product'), route('admin.product.index'));
    });

Route::post('product/create', [ProductController::class, 'store'])
    ->name('product.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Store Product'), route('admin.product.index'));
    });

Route::get('product/edit/{id}', [ProductController::class, 'edit'])
    ->name('product.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Edit Product'), route('admin.product.index'));
    });

Route::patch('product/update/{id}', [ProductController::class, 'update'])
    ->name('product.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Update Product'), route('admin.product.index'));
    });

Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])
    ->name('product.destroy');

Route::get('product/filter_category/{id}', [ProductController::class, 'filter_category'])
->name('product.filter_category')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Filter Category'), route('admin.product.filter_category', ['id' => request()->route('id')]));
});

Route::get('softdelete', [ProductController::class, 'list_softDelete'])->name('soft_delete');

Route::get('forcedelete/{id}', [ProductController::class, 'force_delete'])->name('force_delete');

Route::get('restoredelete/{id}', [ProductController::class, 'restore_delete'])->name('restore_delete');

// Promotion management
Route::get('promotion', [PromotionController::class, 'index'])
    ->name('promotion.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Promotion management'), route('admin.promotion.index'));
    });

Route::get('promotion/show/{id}', [PromotionController::class, 'show'])
->name('promotion.show')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Promotion detail'), route('admin.promotion.index'));
});

Route::get('promotion/create', [PromotionController::class, 'create'])
    ->name('promotion.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Create Promotion'), route('admin.promotion.index'));
    });

Route::post('promotion/create', [PromotionController::class, 'store'])
    ->name('promotion.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Store Promotion'), route('admin.promotion.index'));
    });

Route::get('promotion/edit/{id}', [PromotionController::class, 'edit'])
    ->name('promotion.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Edit Promotion'), route('admin.promotion.index'));
    });

Route::patch('promotion/update/{id}', [PromotionController::class, 'update'])
    ->name('promotion.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Update Promotion'), route('admin.promotion.index'));
    });

Route::delete('promotion/delete/{id}', [PromotionController::class, 'destroy'])
    ->name('promotion.destroy');

// Product Promotion management
Route::get('product_promotion', [ProductPromotionController::class, 'index'])
    ->name('product_promotion.index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Product Promotion management'), route('admin.product_promotion.index'));
    });

Route::get('product_promotion/show/{id}', [ProductPromotionController::class, 'show'])
->name('product_promotion.show')
->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Product Promotion detail'), route('admin.product_promotion.index'));
});

Route::get('product_promotion/create', [ProductPromotionController::class, 'create'])
    ->name('product_promotion.create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Create Product Promotion'), route('admin.product_promotion.index'));
    });

Route::post('product_promotion/create', [ProductPromotionController::class, 'store'])
    ->name('product_promotion.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Store Product Promotion'), route('admin.product_promotion.index'));
    });

Route::get('product_promotion/edit/{id}', [ProductPromotionController::class, 'edit'])
    ->name('product_promotion.edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Edit Product Promotion'), route('admin.product_promotion.index'));
    });

Route::patch('product_promotion/update/{id}', [ProductPromotionController::class, 'update'])
    ->name('product_promotion.update')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Update Product Promotion'), route('admin.product_promotion.index'));
    });

Route::delete('product_promotion/delete/{id}', [ProductPromotionController::class, 'destroy'])
    ->name('product_promotion.destroy');

// Control price

Route::get('reset_price', [ControlPriceController::class, 'reset_price'])
    ->name('reset_price');

Route::get('random_price', [ControlPriceController::class, 'random_price'])
->name('random_price');

Route::get('increase_price', [ControlPriceController::class, 'increase_price'])
->name('increase_price');

Route::get('reduce_price', [ControlPriceController::class, 'reduce_price'])
->name('reduce_price');

Route::get('up_price/{id}', [ControlPriceController::class, 'up_price'])
->name('up_price');

Route::get('downd_price/{id}', [ControlPriceController::class, 'downd_price'])
->name('downd_price');


// EXPORRT FILR EXCEL
Route::get('export', [ExportController::class, 'export'])
    ->name('export');
