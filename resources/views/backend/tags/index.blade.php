@extends('backend.layouts.app')

@section('title', __('Tag Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Tag Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.tag.create')"
                :text="__('Create tag')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.tag-table />
        </x-slot>
    </x-backend.card>
@endsection
