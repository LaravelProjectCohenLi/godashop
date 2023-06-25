<x-livewire-tables::bs4.table.cell>
    {{ $loop->iteration }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->code }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->customer_name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{
        number_format(
            $row->orderDetail->sum(function ($product) {
                return $product->product_price * $product->quantity;
            })
        )
    }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->status_label }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <x-utils.view-button :href="route('admin.order.show', ['id' => $row->id])" />
    <div class="btn-group">
        <button type="button" class="btn btn-info btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Thay đổi trạng thái
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" wire:click="updateStatus({{ $row->id }}, 1)">Chờ xử lý</a>
            <a class="dropdown-item" href="#" wire:click="updateStatus({{ $row->id }}, 2)">Đang xử lý</a>
            <a class="dropdown-item" href="#" wire:click="updateStatus({{ $row->id }}, 3)">Đang giao hàng</a>
            <a class="dropdown-item" href="#" wire:click="updateStatus({{ $row->id }}, 4)">Đã giao xong</a>
            <a class="dropdown-item" href="#" wire:click="updateStatus({{ $row->id }}, 5)">Đã huỷ</a>
        </div>
    </div>
    

    <x-utils.form-button
        :action="route('admin.order.delete', ['id' => $row->id])"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </x-utils.form-button>
</x-livewire-tables::bs4.table.cell>
