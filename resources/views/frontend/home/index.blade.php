@extends('frontend.layouts.app')

@section('title', 'Mỹ phẩm Hàn Quốc, mỹ phẩm cao cấp, kem chống năng, sữa rửa mặt')

@section('keywords')
    <meta name="keywords" content="My pham cao cap, my pham, godashop" />
@endsection

@section('description')
    <meta name="description" content="Đây là trang chuyên bán mỹ phẩm các loại Godashop.com" />
@endsection

@push('slider')
    <x-slider-component></x-slider-component>
@endpush

@push('service')
    @include('frontend/partitions/service')
@endpush

@section('content')
<div class="container">
    <x-feature-product></x-feature-product>
    <x-newest-product></x-newest-product>
    <x-category-product></x-category-product>
</div>
@endsection