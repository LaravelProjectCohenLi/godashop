<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;

class OrderTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('#')),
            Column::make(__('Code'))->sortable(),
            Column::make(__('Customer name'))->sortable(),
            Column::make(__('Total amount')),
            Column::make(__('Status')),
            Column::make(__('Actions')),
        ];
    }

    public function query()
    {
        return Order::with('orderDetail')->orderBy('id', 'desc');
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [

        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'livewire.backend.order-list';
    }

    public function updateStatus($orderId, $status)
    {
        Order::find($orderId)->update(['status' => $status]);       // làm cái repository
        return redirect()->back();
    }
}
