@extends('backend.layouts.app')

@section('title', __('Category Management'))

@section('content')
<x-backend.card> 
    <x-slot name="header">
        @lang('View Category')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Name')</th>
                <td>{{ $categories->name }}</td>
            </tr>

            <tr>
                <th>@lang('Category')</th>
                <td>{{ $categories->parent->name ?? null}}</td>
            </tr>
            
            <tr>
                <th>@lang('Tag')</th>
                <td>
                    @php $count = 0; @endphp
                    @foreach($tags as $tag)
                        @if(in_array($tag->id, $currentTagIds))
                            {{ $tag->name }}
                            @if(++$count !== count($currentTagIds))
                                -
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>@lang('Slug')</th>
                <td>{{ $categories->slug }}</td>
            </tr>

            <tr>
                <th>@lang('Meta Title')</th>
                <td>{{ $categories->meta_title }}</td>
            </tr>

            <tr>
                <th>@lang('Meta Keyword')</th>
                <td>{{ $categories->meta_keyword }}</td>
            </tr>

            <tr>
                <th>@lang('Meta description')</th>
                <td>{{ $categories->meta_description }}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($categories->created_at) ({{ $categories->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($categories->updated_at) ({{ $categories->updated_at->diffForHumans() }})
        </small>
    </x-slot>
</x-backend.card>
@endsection