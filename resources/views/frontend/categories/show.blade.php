@extends('frontend.layouts.app')

@section('title', $category->meta_title )

@section('keywords')
    <meta name="keywords" content="{{ $category->meta_keyword }}" />
@endsection

@section('description')
    <meta name="description" content="{{ $category->meta_description }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <ol class="breadcrumb">
                <li><a href="/" target="_self">Trang chủ</a></li>
                <li><span>/</span></li>
                <li class="active"><span>{{ $category->name }}</span></li>
            </ol>
        </div>
        <div class="col-xs-3 hidden-lg hidden-md">
            <a class="hidden-lg pull-right btn-aside-mobile" href="javascript:void(0)">Bộ lọc <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="clearfix"></div>
        @include('frontend.categories.list', [
            'categoryId' => $category->id,
            'categorySlug' => $category->slug
        ])
        
        @include('frontend.products.list', [
            'products' => $productPaginate->items(),
            'paginateLinks' => $productPaginate->appends(request()->all())->links(),
            'pageTitle' => $category->name,
        ])
    </div>
</div>
@endsection