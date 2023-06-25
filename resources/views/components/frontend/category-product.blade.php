@foreach ($categories as $category)
    @if ($category->products->count() > 0)
        <div class="row equal">
            <div class="col-xs-12">
                <h4 class="home-title">{{$category->name}}</h4>
            </div>
            @foreach ($category->products as $product)
                <div class="col-xs-6 col-sm-3">
                    <div class="product-container">
                        <div class="image">
                            <img class="img-responsive" src="{{ $product->featureImage }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product-meta">
                            <h5 class="name">
                                <a class="product-name" href="{{ url($product->slugUrl) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                            </h5>
                            <div class="product-item-price">
                                <span class="product-item-regular">{{ $product->priceLabel }}</span>
                                <span class="product-item-discount">{{ $product->priceSaleLabel }}</span>           
                            </div>
                        </div>
                        <div class="button-product-action clearfix">
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
    @endif
@endforeach
