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
    {{ $row->type }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->discount_amount }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <del>{{ $row->start_date }}</del>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <del>{{ $row->end_date }}</del>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <x-utils.view-button :href="route('admin.promotion.show', ['id' => $row->id])" />
        
    <x-utils.form-button
        :action="route('admin.promotion.edit', ['id' => $row->id])"
        method="get"
        name="edit-item"
        button-class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i> Edit
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.promotion.destroy', ['id' => $row->id])"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </x-utils.form-button>
</x-livewire-tables::bs4.table.cell>