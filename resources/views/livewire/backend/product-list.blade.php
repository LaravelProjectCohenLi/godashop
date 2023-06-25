<x-livewire-tables::bs4.table.cell>
    {{ $loop->iteration }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <img src="{{ url($row->feature_image) }}" width="50" />
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if ($row->category)
        <a href="{{ route('admin.product.filter_category', ['id' => $row->category->id]) }}">{{ $row->category->name }}</a>
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <del>{{ $row->price_label }}</del>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->price_sale_label }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <x-utils.view-button :href="route('admin.product.show', ['id' => $row->id])" />
        
    <x-utils.form-button
        :action="route('admin.product.edit', ['id' => $row->id])"
        method="get"
        name="edit-item"
        button-class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i> Edit
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.product.destroy', ['id' => $row->id])"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Del
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.up_price', ['id' => $row->id])"
        method="get"
        name="increase-item"
        button-class="btn btn-warning btn-sm">
        <i class="fas fa-arrow-alt-circle-up"></i> Increase
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.downd_price', ['id' => $row->id])"
        method="get"
        name="reduce-item"
        button-class="btn btn-info btn-sm">
        <i class="fas fa-arrow-circle-down"></i> Reduce
    </x-utils.form-button>
</x-livewire-tables::bs4.table.cell>