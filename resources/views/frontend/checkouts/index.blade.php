@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="/" target="_self">Giỏ hàng</a></li>
                <li><span>/</span></li>
                <li class="active"><span>Thông tin giao hàng</span></li>
            </ol>
            @if(session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if(session()->has('error'))
                <p class="alert alert-success">{{ session()->get('error') }}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <aside class="col-md-6 cart-checkout">
            @if ($products -> isNotEmpty())
            @foreach ($products as $product)
                <div class="row">
                    <div class="col-xs-2">
                        <img class="img-responsive" src="{{ $product->feature_image}}" alt="{{ $product->name }}"> 
                    </div>
                    <div class="col-xs-7">
                        <a class="product-name" href="chi-tiet-san-pham.html">{{ $product->name }}</a> 
                        <br>
                        <span>{{ $product->qty }}</span> x <span>{{ $product->price_label }}</span>
                    </div>
                    <div class="col-xs-3 text-right">
                        <span>{{ $product->price_label }}</span>
                    </div>
                </div>
                <hr>
            @endforeach
                <div class="row">
                    <div class="col-xs-6">
                        Tạm tính
                    </div>
                    <div class="col-xs-6 text-right">
                        {{ $totalPrice }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        Phí vận chuyển
                    </div>
                    <div class="col-xs-6 text-right">
                        <span class="shipping-fee" data="">50,000₫</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        Tổng cộng
                    </div>
                    <div class="col-xs-6 text-right">
                        <span class="payment-total" data="1230000">{{ $totalPrice }}₫</span>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-danger">Bạn chưa chọn sản phẩm, mời bạn chọn sản phẩm</p>
                    </div>
                    
                </div>
            @endif
        </aside>
        <div class="ship-checkout col-md-6">
            <h4>Thông tin giao hàng</h4>
            <div>Bạn đã có tài khoản? <a href="javascript:void(0)" class="btn-login">Đăng Nhập  </a></div>
            <br>
            <form action="{{ route('frontend.checkout.process')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="text" value="" class="form-control" name="fullname" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
                        @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="tel" value="" class="form-control" name="mobile" placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
                        @error('mobile')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <select name="province" class="form-control province" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')" oninput="this.setCustomValidity('')">
                            <option value="">Tỉnh / thành phố</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <select name="district" class="form-control district" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')" oninput="this.setCustomValidity('')">
                            <option value="">Quận / huyện</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->code }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('district')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <select name="ward" class="form-control ward" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')" oninput="this.setCustomValidity('')">
                            <option value="">Phường / xã</option>
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->code }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>
                        @error('ward')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="text" name="address" value="" class="form-control" placeholder="Số nhà, tên đường"  required="" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')" oninput="this.setCustomValidity('')">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <h4>Phương thức thanh toán</h4>
                <div class="form-group">
                    <label> <input type="radio" name="payment_method" checked="" value="0"> Thanh toán khi giao hàng (COD) </label>
                    <div></div>
                </div>
                <div class="form-group">
                    <label> <input type="radio" name="payment_method" value="1"> Chuyển khoản qua ngân hàng </label>
                    <div class="bank-info">STK: 0421003707901<br>Chủ TK: Nguyễn Hữu Lộc. Ngân hàng: Vietcombank TP.HCM <br>
                        Ghi chú chuyển khoản là tên và chụp hình gửi lại cho shop dễ kiểm tra ạ
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary pull-right">Hoàn tất đơn hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection