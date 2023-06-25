@extends('backend.layouts.app')

@section('title', __('Product Promotion Management'))

@section('content')
<x-backend.card> 
    <x-slot name="header">
        @lang('View Product Promotion')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.product_promotion.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            {{-- <tr>
                <th>@lang('Image')</th>
                <td><img src="{{ url($promotions->feature_image) }}" width="150" /></td>
            </tr> --}}

            <tr>
                <th>@lang('Promotion Name')</th>
                <td>{{ $productpromotions->promotion->name ?? null}}</td>
            </tr>

            <tr>
                <th>@lang('Product Name')</th>
                <td> {{ $productpromotions->product->name ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('Quantity')</th>
                <td>{{ $productpromotions->quantity }}</td>
            </tr>

        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($productpromotions->created_at) ({{ $productpromotions->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($productpromotions->updated_at) ({{ $productpromotions->updated_at->diffForHumans() }})
        </small>
    </x-slot>
</x-backend.card>
@endsection