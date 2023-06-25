@extends('frontend.layouts.app')

@section('title', 'Mỹ phẩm Hàn Quốc, mỹ phẩm cao cấp, kem chống năng, sữa rửa mặt, chính sách đổi trả')

@section('keywords')
    <meta name="keywords" content="My pham cao cap, my pham, godashop" />
@endsection

@section('description')
    <meta name="description" content="Chính sách đổi trả chuyên bán mỹ phẩm các loại Godashop.com" />
@endsection

@section('content')
<div class="container">
    {!! getPolicyInfo('return_back', 'content') !!} đổi trả
</div>
@endsection