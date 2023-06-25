@extends('backend.layouts.app')

@section('title', __('Edit Product'))

@section('content')
    <x-forms.patch :action="route('admin.product.update', ['id' => $product->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Product')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Cancel')" />
            </x-slot>
            
            <x-slot name="body">
                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>
                    <div class="col-md-10">
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->


                <div class="form-group row">
                    <label for="tag" class="col-md-2 col-form-label">@lang('Tag')</label>
                    <div class="col-md-10">
                        <select name="tag_ids[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $currentTagIds) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->




                {{-- <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Tag')</label>
                    <div class="col-md-10">
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" @if(in_array($tag->id, $currentTagIds)) checked @endif />
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div><!--form-group--> --}}

                <div class="form-group row">
                    <label for="is_feature" class="col-md-2 col-form-label">@lang('Feature')</label>
                    <div class="col-md-10">
                        <input type="checkbox" name="is_feature" value="1" {{ $product->is_feature ? 'checked' : '' }} />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ $product->name }}" maxlength="100" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="barcode" class="col-md-2 col-form-label">@lang('Barcode')</label>
                    <div class="col-md-10">
                        <input type="text" name='barcode' value="{{ $product->barcode }}" class="form-control" placeholder="{{ __('Barcode') }}" maxlength="50" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Sku')</label>
                    <div class="col-md-10">
                        <input type="text" name="sku" value="{{ $product->sku }}" class="form-control" placeholder="{{ __('Sku') }}" maxlength="50" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Price')</label>
                    <div class="col-md-10">
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="{{ __('Price') }}" maxlength="20" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Sale Price')</label>
                    <div class="col-md-10">
                        <input type="text" name="sale_price" value="{{ $product->sale_price }}" class="form-control" placeholder="{{ __('Sale Price') }}" maxlength="20" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Description')</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" rows="4" placeholder="{{ __('Description') }}">{{ $product->description }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Content')</label>
                    <div class="col-md-10">
                        <textarea id="myTextarea" name="content" class="form-control" rows="6" placeholder="{{ __('Content') }}">{{ $product->content }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Slug')</label>
                    <div class="col-md-10">
                        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" placeholder="{{ __('Slug') }}" maxlength="200" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Title')</label>
                    <div class="col-md-10">
                        <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control" placeholder="{{ __('Meta Title') }}" maxlength="300" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Keyword')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_keyword" value="{{ $product->meta_keyword }}" class="form-control" placeholder="{{ __('Meta Keyword') }}" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Description')</label>
                    <div class="col-md-10">
                        <textarea name="meta_description" class="form-control" rows="4" placeholder="{{ __('Meta Description') }}">{{ $product->meta_description }}</textarea>
                    </div>
                </div><!--form-group-->
                
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" class="form-control" />
                        <p>
                            <br/>
                            <img src="{{ $product->feature_image }}" width="100" />
                        </p>
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Product')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
