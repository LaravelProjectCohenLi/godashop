<div class="cart-modal">
    <div class="modal-header bg-color">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title text-center">Giỏ hàng</h3>
    </div>

    <div class="modal-body">
        <div class="page-content">
            <div class="clearfix hidden-sm hidden-xs">
                <div class="col-xs-1">
                </div>
                <div class="col-xs-3">
                    <div class="header">
                        Sản phẩm
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="header">
                        Đơn giá
                    </div>
                </div>
                <div class="label_item col-xs-3">
                    <div class="header">
                        Số lượng
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="header">
                        Thành tiền
                    </div>
                </div>
                <div class="lcol-xs-1">
                </div>
            </div>
            @if ($products->isNotEmpty())
                <div class="cart-product">
                    <hr>
                    @foreach($products as $key => $product)
                        <div class="clearfix text-left">
                            <div class="row">
                                <div class="col-sm-6 col-md-1">
                                    <div><img class="img-responsive" src="{{ $product['feature_image'] ?? null }}" alt="{{ $product['name'] ?? null }}"></div>
                                </div>
                                <div class="col-sm-6 col-md-3"><a class="product-name" href="#">{{ $product['name'] ?? null }}</a></div>
                                <div class="col-sm-6 col-md-2"><span class="product-item-discount">{{ $product['price_label'] ?? null }}</span></div>
                                <div class="col-sm-6 col-md-3"><input type="hidden" value="1">
                                    <input type="number" wire:model="products.{{ $key }}.qty" wire:blur="updateQuantity({{ $product['id'] ?? null }})" min="1" :key="{{ $product['id'] ?? 0 }}" value="{{ $product['qty'] ?? 1 }}" />
                                </div>
                                <div class="col-sm-6 col-md-2"><span>{{ number_format(($product['price'] ?? 0) * ($product['qty'] ?? 0)) }}đ</span></div>
                                <div class="col-sm-6 col-md-1"><a class="remove-product" href="javascript:void(0)" wire:click="deleteProductInCart({{ $product['id'] ?? null }})"><span class="glyphicon glyphicon-trash"></span></a></div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            @else
                <div class="cart-product">Không có sản phẩm nào trong giỏ</div>
            @endif
        </div>
        @if (!empty($removeItemMessageSuccess) && $products->isNotEmpty()) <div class="alert alert-success">{{ $removeItemMessageSuccess }}</div> @endif
    </div>

    <div class="modal-footer">
        <div class="clearfix">
            <div class="col-xs-12 text-right">
                <p>
                    <span>Tổng tiền</span>
                    <span class="price-total">{{ $totalPrice }}₫</span>
                </p>
                <input type="button" name="back-shopping" class="btn btn-default" value="Tiếp tục mua sắm">
                <a href="{{ route('frontend.checkout') }}" class="btn btn-primary" title="Đặt hàng">Đặt hàng</a>
            </div>
        </div>
    </div>
</div>