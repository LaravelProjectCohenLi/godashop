<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\ProductPromotion;

class ProductPromotionTable extends DataTableComponent
{
    public function rowView(): string
    {
        return 'livewire.backend.product-promotion-list';
    }

    /**
     * @return array
     */

    public function columns(): array
    {
        return [
        Column::make(__('#')),
        Column::make(__('Image')),
        Column::make(__('Promotion Name'))->sortable(),
        Column::make(__('Product Name'))->sortable(),
        Column::make(__('Quantity'))->sortable(),
        Column::make(__('Actions'))
        ];
    }

    public function query()
    {
        return ProductPromotion::with('product')->with('promotion') // thêm relationship của model Product
        ->orderBy('id', 'desc');;
    }
 
     /**
      * @return array
      */
    public function filters(): array
    {
        return [

        ];
    }
}
