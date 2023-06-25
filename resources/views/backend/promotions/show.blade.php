@extends('backend.layouts.app')

@section('title', __('Promotion Management'))

@section('content')
<x-backend.card> 
    <x-slot name="header">
        @lang('View Promotion')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.promotion.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Image')</th>
                <td><img src="{{ url($promotions->feature_image) }}" width="150" /></td>
            </tr>

            <tr>
                <th>@lang('Name')</th>
                <td>{{ $promotions->name }}</td>
            </tr>

            <tr>
                <th>@lang('Type')</th>
                <td> {{ $promotions->type ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('Discount amount')</th>
                <td>{{ $promotions->discount_amount }}</td>
            </tr>

            <tr>
                <th>@lang('Start date')</th>
                <td>{{ $promotions->start_date }}</td>
            </tr>

            <tr>
                <th>@lang('End date')</th>
                <td>{{ $promotions->end_date }}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($promotions->created_at) ({{ $promotions->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($promotions->updated_at) ({{ $promotions->updated_at->diffForHumans() }})
        </small>
    </x-slot>
</x-backend.card>
@endsection