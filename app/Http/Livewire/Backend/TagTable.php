<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Tag;

class TagTable extends DataTableComponent
{

    public function rowView(): string
    {
        return 'livewire.backend.tag-list';
    }

    /**
     * @return array
     */

    public function columns(): array
    {
        return [
            Column::make(__('#')),
            Column::make(__('Name'))->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query()
    {
        return Tag::query()->orderBy('id', 'desc');
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
