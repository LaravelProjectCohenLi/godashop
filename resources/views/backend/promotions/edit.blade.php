@extends('backend.layouts.app')

@section('title', __('Edit Promotion'))

@section('content')
    <x-forms.patch :action="route('admin.promotion.update', ['id' => $promotions->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Promotion')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.promotion.index')" :text="__('Cancel')" />
            </x-slot>
            
            <x-slot name="body">
               <div class="form-group row">
                   <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                   <div class="col-md-10">
                       <input type="text" name="name" class="form-control" value="{{ $promotions->name }}" maxlength="100" required/>
                   </div>
               </div><!--form-group-->

               <div class="form-group row">
                  <label for="type" class="col-md-2 col-form-label">@lang('Loại khuyến mãi')</label>
                  <div class="col-md-10">
                     <select name="type" id="type" class="form-control">
                        <option value="percent" {{ $promotions->type === 'percent' ? 'selected' : '' }}>Percent</option>           
                        <option value="money" {{ $promotions->type === 'money' ? 'selected' : '' }}>Money</option>
                        <option value="flatrate" {{ $promotions->type === 'flatrate' ? 'selected' : '' }}>Flat Rate</option>
                        <option value="totalorder" {{ $promotions->type === 'totalorder' ? 'selected' : '' }}>Total Order</option>
                        <option value="freeship" {{ $promotions->type === 'freeship' ? 'selected' : '' }}>Free Shipping</option>
                        <option value="buy-one-get-one" {{ $promotions->type === 'buy-one-get-one' ? 'selected' : '' }}>Buy One Get One</option>
                        <option value="group" {{ $promotions->type === 'group' ? 'selected' : '' }}>Group</option>
                     </select> 
                  </div>
               </div><!--form-group-->             

               <div class="form-group row">
                 <label for="discount_amount" class="col-md-2 col-form-label">@lang('Số tiền giảm giá (Percent-Money)')</label>
                 <div class="col-md-10">
                    <input type="text" name="discount_amount" class="form-control" value="{{ $promotions->discount_amount }}" />
                 </div>
               </div><!--form-group-->

               <div class="form-group row">
                 <label for="start_date" class="col-md-2 col-form-label">@lang('Start date')</label>
                 <div class="col-md-10">
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-d', strtotime($promotions->start_date)) }}" required />
                 </div>
               </div><!--form-group-->

               <div class="form-group row">
                 <label for="end_date" class="col-md-2 col-form-label">@lang('End date')</label>
                 <div class="col-md-10">
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d', strtotime($promotions->end_date)) }}" required />
                 </div>
               </div><!--form-group-->

               <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">@lang('Image')</label>
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" />
                    <p>
                        <br/>
                        <img src="{{ $promotions->feature_image }}" width="100" />
                    </p>
                </div>
                </div><!--form-group-->
           </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Promotion')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
