<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Products\Product;

class ProductTable extends DataTableComponent
{
    public function rowView(): string
    {
        return 'livewire.backend.product-list';
    }

    /**
     * @return array
     */

    public function columns(): array
    {
        return [
            Column::make(__('#')),
            Column::make(__('Image')),
            Column::make(__('Name'))->sortable(),
            Column::make(__('Category')),
            Column::make(__('Price'))->sortable(),
            Column::make(__('Price sale'))->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query()
    {
        return Product::with('category')->orderBy('id', 'desc');
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
