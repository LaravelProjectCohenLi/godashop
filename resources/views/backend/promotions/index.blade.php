@extends('backend.layouts.app')

@section('title', __('Promotion Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Promotion Management')
        </x-slot>
        <x-slot name="headerActions">
          <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.promotion.create')"
            :text="__('Create promotion')"
          />
        </x-slot>

        <x-slot name="body">
          <livewire:backend.promotion-table />
        </x-slot>
    </x-backend.card>
@endsection
