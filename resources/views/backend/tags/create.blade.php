@extends('backend.layouts.app')

@section('title', __('Create Tag'))

@section('content')
    <x-forms.post :action="route('admin.tag.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Tag')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.tag.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Name') }}" value="" maxlength="100" required />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Tag')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
