@extends('backend.layouts.app')

@section('title', __('Product Management'))

@section('content')

<x-backend.card> 
    <x-slot name="header">
        @lang('View Product')
    </x-slot>

    <x-slot name="headerActions">
        {{-- <x-utils.link class="card-header-action" :href="{{ Request::path()}}" :text="__('Back')" /> --}}
        <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Image')</th>
                <td><img src="{{ url($product->feature_image) }}" width="150" /></td>
            </tr>

            <tr>
                <th>@lang('Category')</th>
                <td> {{ $product->category->name ?? null }}</td>
            </tr>

            <tr>
                <th>@lang('Feature')</th>
                <td>
                    <span class="{{ $product->is_feature ? 'text-primary' : 'text-muted' }}">{{ $product->is_feature ? 'Nổi bật' : 'Không nổi bật' }}</span>
                </td>
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
                <th>@lang('Name')</th>
                <td>{{ $product->name }}</td>
            </tr>

            <tr>
                <th>@lang('Barcode')</th>
                <td>{{ $product->barcode }}</td>
            </tr>

            <tr>
                <th>@lang('Sku')</th>
                <td>{{ $product->sku }}</td>
            </tr>

            <tr>
                <th>@lang('Price')</th>
                <td>{{ $product->price_label }}</td>
            </tr>

            <tr>
                <th>@lang('Sale Price')</th>
                <td>{{ $product->price_sale_label }}</td>
            </tr>

            <tr>
                <th>@lang('Description')</th>
                <td>{{ $product->description }}</td>
            </tr>

            <tr>
                <th>@lang('Content')</th>
                <td>{{ $product->content }}</td>
            </tr>

            <tr>
                <th>@lang('Slug')</th>
                <td>{{ $product->slug }}</td>
            </tr>

            <tr>
                <th>@lang('Meta Title')</th>
                <td>{{ $product->meta_title }}</td>
            </tr>

            <tr>
                <th>@lang('Meta Keyword')</th>
                <td>{{ $product->meta_keyword }}</td>
            </tr>

            <tr>
                <th>@lang('Meta description')</th>
                <td>{{ $product->meta_description }}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($product->created_at) ({{ $product->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($product->updated_at) ({{ $product->updated_at->diffForHumans() }})

            {{-- @if($tags->trashed())
                <strong>@lang('Account Deleted'):</strong> @displayDate($tags->deleted_at) ({{ $tags->deleted_at->diffForHumans() }})
            @endif --}}
        </small>
    </x-slot>
</x-backend.card>
@endsection