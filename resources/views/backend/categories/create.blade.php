@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.category.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Category')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Name') }}" value="" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>
                    <div class="col-md-10">
                        <select name="parent_id" class="form-control">
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
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" @if(in_array($tag->id, request()->tag_ids ?? [])) checked @endif />
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="slug" class="col-md-2 col-form-label">@lang('Slug')</label>
                    <div class="col-md-10">
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="{{ __('Slug') }}" value="" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="meta_title" class="col-md-2 col-form-label">@lang('Meta title')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control" placeholder="{{ __('Meta title') }}" value="" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="meta_keyword" class="col-md-2 col-form-label">@lang('Meta keyword')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control" placeholder="{{ __('Meta keyword') }}" value="" maxlength="100" required />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="meta_description" class="col-md-2 col-form-label">@lang('Meta Description')</label>
                    <div class="col-md-10">
                        <textarea name="meta_description" value="{{ old('meta_description') }}" class="form-control" rows="4" placeholder="{{ __('Meta Description') }}" value="{{ old('meta_description') }}" >

                        </textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
