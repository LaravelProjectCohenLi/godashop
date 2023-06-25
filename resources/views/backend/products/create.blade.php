@extends('backend.layouts.app')

@section('title', __('Create Product'))

@section('content')
    <x-forms.post :action="route('admin.product.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Product')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>
                    <div class="col-md-10">
                        <select name="category_id" class="form-control">
                            <option selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="tag" class="col-md-2 col-form-label">@lang('Tag')</label>
                    <div class="col-md-10">
                        <select name="tag_ids[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->




                {{-- <div class="form-group row">
                    <label for="tag" class="col-md-2 col-form-label">@lang('Tag')</label>
                    <div class="col-md-10">
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" @if(in_array($tag->id, request()->tag_ids ?? [])) checked @endif />
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div><!--form-group--> --}}

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Feature')</label>
                    <div class="col-md-10">
                        <input type="checkbox" name="is_feature" value="1" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Barcode')</label>
                    <div class="col-md-10">
                        <input type="text" name='barcode' class="form-control" placeholder="{{ __('Barcode') }}" value="{{ old('barcode') }}" maxlength="50" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Sku')</label>
                    <div class="col-md-10">
                        <input type="text" name="sku" class="form-control" placeholder="{{ __('Sku') }}" value="{{ old('sku') }}" maxlength="50" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Price')</label>
                    <div class="col-md-10">
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="{{ __('Price') }}" value="{{ old('price') }}" maxlength="20" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Sale Price')</label>
                    <div class="col-md-10">
                        <input type="text" name="sale_price" class="form-control" placeholder="{{ __('Sale Price') }}" value="{{ old('sale_price') }}" maxlength="20" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Description')</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" rows="4" placeholder="{{ __('Description') }}" value="{{ old('description') }}"></textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Content')</label>
                    <div class="col-md-10">
                        <textarea id="myTextarea" name="content" class="form-control" rows="6" placeholder="{{ __('Content') }}" value="{{ old('content') }}"></textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Slug')</label>
                    <div class="col-md-10">
                        <input type="text" name="slug" class="form-control" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" maxlength="200" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Title')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_title" class="form-control" placeholder="{{ __('Meta Title') }}" value="{{ old('meta_title') }}" maxlength="300" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Keyword')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_keyword" class="form-control" placeholder="{{ __('Meta Keyword') }}" value="{{ old('meta_keyword') }}" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Description')</label>
                    <div class="col-md-10">
                        <textarea name="meta_description" class="form-control" rows="4" placeholder="{{ __('Meta Description') }}" value="{{ old('meta_description') }}" >

                        </textarea>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Product')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
