@extends('backend.layouts.app')

@section('title', __('Product Promotion Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Product Promotion Management')
        </x-slot>
        <x-slot name="headerActions">
          <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.product_promotion.create')"
            :text="__('Create product promotion')"
          />
        </x-slot>

        <x-slot name="body">
          <livewire:backend.product-promotion-table />
        </x-slot>
    </x-backend.card>
@endsection
