<x-livewire-tables::bs4.table.cell>
    {{ $loop->iteration }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if ($row->category)

    @php
        dd($row->category);
    @endphp 
        @if ($row->category->parent)
            {{ $row->category->parent->name }} > {{ $row->category->name }}
        @else
            {{ $row->category->name }}
        @endif
    @else
        No category
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->slug }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->meta_keyword }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <x-utils.view-button :href="route('admin.category.show', ['id' => $row->id])" />
        
    <x-utils.form-button
        :action="route('admin.category.edit', ['id' => $row->id])"
        method="get"
        name="edit-item"
        button-class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i> Edit
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.category.destroy', ['id' => $row->id])"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </x-utils.form-button>
</x-livewire-tables::bs4.table.cell>