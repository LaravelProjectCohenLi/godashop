@extends('backend.layouts.app')

@section('title', __('Create Promotion'))

@section('content')
    <x-forms.post :action="route('admin.promotion.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Promotion')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.promotion.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="type" class="col-md-2 col-form-label">@lang('Loại khuyến mãi')</label>
                    <div class="col-md-10">
                     <select name="type" id="type" class="form-control">
                        <option value="percent">Percent</option>           
                        <option value="money">Money</option>
                        <option value="flatrate">Flat Rate</option>
                        <option value="totalorder">Total Order</option>
                        <option value="freeship">Free Shipping</option>
                        <option value="buy-one-get-one">Buy One Get One</option>
                        <option value="group">Group</option>
                     </select> 
                    </div>
                </div><!--form-group-->             

                <div class="form-group row">
                  <label for="discount_amount" class="col-md-2 col-form-label">@lang('Số tiền giảm giá (Percent-Money)')</label>
                  <div class="col-md-10">
                     <input type="text" name="discount_amount" class="form-control" placeholder="{{ __('Percent-Money') }}" value="{{ old('discount_amount') }}" />
                  </div>
                </div><!--form-group-->

                <div class="form-group row">
                  <label for="start_date" class="col-md-2 col-form-label">@lang('Start date')</label>
                  <div class="col-md-10">
                     <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required />
                  </div>
                </div><!--form-group-->

                <div class="form-group row">
                  <label for="end_date" class="col-md-2 col-form-label">@lang('End date')</label>
                  <div class="col-md-10">
                     <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required />
                  </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Promotion')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
