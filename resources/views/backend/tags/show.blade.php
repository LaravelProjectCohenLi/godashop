@extends('backend.layouts.app')

@section('title', __('Tag Management'))

@section('content')
<x-backend.card> 
    <x-slot name="header">
        @lang('View Tag')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.tag.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Name')</th>
                <td>{{ $tags->name }}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($tags->created_at) ({{ $tags->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($tags->updated_at) ({{ $tags->updated_at->diffForHumans() }})

            {{-- @if($tags->trashed())
                <strong>@lang('Account Deleted'):</strong> @displayDate($tags->deleted_at) ({{ $tags->deleted_at->diffForHumans() }})
            @endif --}}
        </small>
    </x-slot>
</x-backend.card>
@endsection