@extends('backend.layouts.app')

@section('title', __('Category Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Category Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.category.create')"
                :text="__('Create category')"
            />
        </x-slot>
        <x-slot name="body">
            <livewire:backend.categoty-table />
        </x-slot>
    </x-backend.card>
@endsection
