@extends('backend.layouts.app')

@section('title', __('Product Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Product Management')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.export')"
            :text="__('Export Excel')"
            />

            <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.reduce_price')"
            :text="__('10% reduce')"
            />
            
            <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.increase_price')"
            :text="__('10% increase')"
            />

            <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.random_price')"
            :text="__('Random Price')"
            />

            <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.reset_price')"
            :text="__('Reset Price 500K')"
            />

            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.soft_delete')"
                :text="__('Restore')"
            />

            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.product.create')"
                :text="__('Create product')"
            />
        </x-slot>
        <x-slot name="body">
            <livewire:backend.product-table />
        </x-slot>
    </x-backend.card>
@endsection
