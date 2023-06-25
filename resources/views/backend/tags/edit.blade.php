@extends('backend.layouts.app')

@section('title', __('Edit Tag'))

@section('content')
    <x-forms.patch :action="route('admin.tag.update', ['id' => $tags->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Tag')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.tag.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $tags->name }}" maxlength="100" />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Tag')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
