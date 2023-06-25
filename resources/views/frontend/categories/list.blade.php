<aside class="col-md-3">
    <div class="inner-aside">
        <div class="category ">
            <h5>Danh mục sản phẩm</h5>
            <x-menu-category :menuType="'left'" :categoryId="$categoryId ?? null"></x-menu-category>
        </div>
        @include('frontend.products.filter', [
            'categoryId' => $categoryId ?? null,
            'categorySlug' => $categorySlug ?? null, 
        ])
    </div>
</aside>