@extends('backend.layouts.app')

@section('title', __('Edit Category'))

@section('content')
    <x-forms.patch :action="route('admin.category.update', ['id' => $categories->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Category')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ $categories->name }}" maxlength="100" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>
                    <div class="col-md-10">
                        <select name="parent_id" class="form-control">
                            @foreach ($getcategories as $categoryOption)
                                <option {{ $categoryOption->id == $categories->parent_id ? 'selected' : '' }} value="{{ $categoryOption->id }}">{{ $categoryOption->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Tag')</label>
                    <div class="col-md-10">
                        @foreach ($tags as $tag)
                            <label>
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" @if(in_array($tag->id, $currentTagIds)) checked @endif />
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Slug')</label>
                    <div class="col-md-10">
                        <input type="text" name="slug" value="{{ $categories->slug }}" class="form-control" placeholder="{{ __('Slug') }}" maxlength="200" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Title')</label>
                    <div class="col-md-10">
                        <input type="text" value="{{ $categories->meta_title }}" name="meta_title" class="form-control" placeholder="{{ __('Meta Title') }}" maxlength="300" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Keyword')</label>
                    <div class="col-md-10">
                        <input type="text" name="meta_keyword" value="{{ $categories->meta_keyword }}" class="form-control" placeholder="{{ __('Meta Keyword') }}" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Meta Description')</label>
                    <div class="col-md-10">
                        <textarea name="meta_description" class="form-control" rows="4" placeholder="{{ __('Meta Description') }}">{{ $categories->meta_description }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
