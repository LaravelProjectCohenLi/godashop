<div class="col-md-9 products">
    <div class="row equal">
        <div class="col-xs-6">
            <h4 class="home-title">{{$pageTitle}}</h4>
        </div>
        <div class="col-xs-6 sort-by">
            <div class="pull-right">
                <label class="left hidden-xs" for="sort-select">Sắp xếp: </label>
                <select id="sort-select" onchange="sortProduct(this.value)">
                    <option value="" selected="">Mặc định</option>
                    <option value="price-asc" {{ request()->get('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price-desc" {{ request()->get('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    <option value="alpha-asc" {{ request()->get('sort_by') == 'alpha-asc' ? 'selected' : '' }}>Từ A-Z</option>
                    <option value="alpha-desc" {{ request()->get('sort_by') == 'alpha-desc' ? 'selected' : '' }}>Từ Z-A</option>
                    <option value="created-asc" {{ request()->get('sort_by') == 'created-asc' ? 'selected' : '' }}>Cũ đến mới</option>
                    <option value="created-desc" {{ request()->get('sort_by') == 'created-desc' ? 'selected' : '' }}>Mới đến cũ</option>
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        @foreach ($products as $product)
            <div class="col-xs-6 col-sm-4">
                <div class="product-container">
                    <div class="image">
                        <img class="img-responsive" src="{{ $product->featureImage }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-meta">
                        <h5 class="name">
                            <a class="product-name" href="{{ url($product->slugUrl) }}" title="{{ $product->name }}">{{ $product->name }} - {{ $product->id }}</a>
                        </h5>
                        <div class="product-item-price">
                            <span class="product-item-regular">{{ $product->priceSaleLabel }}</span>
                            <span class="product-item-discount">{{ $product->priceLabel }}</span>            
                        </div>
                    </div>
                    <div class="button-product-action clearfix" style="display: none;">
                        <div class="cart icon">
                            <a class="btn btn-outline-inverse buy" product-id="{{ $product->id }}" href="javascript:void(0)" title="Thêm vào giỏ">
                            Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="quickview icon">
                            <a class="btn btn-outline-inverse" href="{{ url($product->slugUrl) }}" title="Xem nhanh">
                            Xem chi tiết <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Paging -->
    {!! $paginateLinks !!}
    <!-- End paging -->
</div>