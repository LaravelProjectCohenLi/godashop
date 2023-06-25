<x-livewire-tables::bs4.table.cell>
    {{ $loop->iteration }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell width="50%">
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell width="50%">
    <x-utils.view-button :href="route('admin.tag.show', ['id' => $row->id])" />
        
    <x-utils.form-button
        :action="route('admin.tag.edit', ['id' => $row->id])"
        method="get"
        name="edit-item"
        button-class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i> Edit
    </x-utils.form-button>

    <x-utils.form-button
        :action="route('admin.tag.destroy', ['id' => $row->id])"
        method="delete"
        name="delete-item"
        button-class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </x-utils.form-button>
</x-livewire-tables::bs4.table.cell>