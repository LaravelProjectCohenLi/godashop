@extends('frontend.layouts.app')

@section('title', 'Mỹ phẩm Hàn Quốc, mỹ phẩm cao cấp, kem chống năng, sữa rửa mặt, trang sản phẩm')

@section('keywords')
    <meta name="keywords" content="My pham cao cap, my pham, godashop" />
@endsection

@section('description')
    <meta name="description" content="Trang sản phẩm chuyên bán mỹ phẩm các loại Godashop.com" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <ol class="breadcrumb">
                <li><a href="/" target="_self">Trang chủ</a></li>
                <li><span>/</span></li>
                <li class="active"><span>Tất cả sản phẩm</span></li>
            </ol>
        </div>
        <div class="col-xs-3 hidden-lg hidden-md">
            <a class="hidden-lg pull-right btn-aside-mobile" href="javascript:void(0)">Bộ lọc <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="clearfix"></div>
        @include('frontend.categories.list')
        @include('frontend.products.list', [
            'products' => $productPaginate->items(),
            'paginateLinks' => $productPaginate->appends(request()->all())->links(),
            'pageTitle' => 'Tất cả sản phẩm',
        ])
    </div>
</div>
@endsection