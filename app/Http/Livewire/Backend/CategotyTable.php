<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;

class CategotyTable extends DataTableComponent
{
    public function rowView(): string
    {

        return 'livewire.backend.categoty-list';
    }

    /**
     * @return array
     */

     public function columns(): array
     {
         return [
            Column::make(__('#')),
            Column::make(__('Name'))->sortable(),
            Column::make(__('Parent'))->sortable(),
            Column::make(__('Slug'))->sortable(),
            Column::make(__('Meta Keyword'))->sortable(),
            Column::make(__('Actions')),
         ];
     }
 
    public function query()
    {
        return Category::with('parent')->orderBy('id', 'desc');
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
