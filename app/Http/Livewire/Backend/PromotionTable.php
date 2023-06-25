<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Promotion;

class PromotionTable extends DataTableComponent
{
    public function rowView(): string
    {
        return 'livewire.backend.promotion-list';
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
            Column::make(__('Type'))->sortable(),
            Column::make(__('Discount'))->sortable(),
            Column::make(__('Start_date'))->sortable(),
            Column::make(__('End_date'))->sortable(),
            Column::make(__('Actions')),
         ];
     }
 
     public function query()
     {
        return Promotion::with('products')->orderBy('id', 'desc');
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
