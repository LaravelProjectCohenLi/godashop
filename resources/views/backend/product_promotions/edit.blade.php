@extends('backend.layouts.app')

@section('title', __('Edit Product Promotion'))

@section('content')
    <x-forms.patch :action="route('admin.product_promotion.update', ['id' => $productpromotions->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Product Promotion')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product_promotion.index')" :text="__('Cancel')" />
            </x-slot>
            
            <x-slot name="body">
                <div class="form-group row">
                    <label for="promotion_name" class="col-md-2 col-form-label">@lang('Promotion Name')</label>
                    <div class="col-md-10">
                        <select name="promotion_id" class="form-control">
                            @foreach ($promotions as $promotion)
                                <option {{ $productpromotions->promotion_id == $promotion->id ? 'selected' : '' }} value="{{ $promotion->id }}">{{ $promotion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->
                
                <div class="form-group row">
                    <label for="product_id" class="col-md-2 col-form-label">@lang('Product Name')</label>
                    <div class="col-md-10">
                        <select name="product_id" class="form-control">
                            @foreach ($products as $product)
                                <option {{ $productpromotions->product_id == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group--> 

                <div class="form-group row">
                    <label for="quantity" class="col-md-2 col-form-label">@lang('Quantity')</label>
                    <div class="col-md-10">
                        <input type="text" name="quantity" class="form-control" value="{{ $productpromotions->quantity }}" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">@lang('Image')</label>
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" />
                    <p>
                        <br/>
                        <img src="{{ $productpromotions->feature_image }}" width="100" />
                    </p>
                </div>
                </div><!--form-group-->
           </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Product Promotion')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
