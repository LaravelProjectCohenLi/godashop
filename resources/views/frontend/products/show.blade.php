@extends('frontend.layouts.app')

@section('title', 'Mỹ phẩm Hàn Quốc, mỹ phẩm cao cấp, kem chống năng, sữa rửa mặt trang chi tiết sản phẩm')

@section('keywords')
    <meta name="keywords" content="My pham cao cap, my pham, godashop" />
@endsection

@section('description')
    <meta name="description" content="Chi tiết sản phẩm chuyên bán mỹ phẩm các loại Godashop.com" />
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
        <aside class="col-md-3">
            <div class="inner-aside">
                <div class="category ">
                    <h5>Danh mục sản phẩm</h5>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">Tât cả sản phẩm</a>
                        </li>
                        <li><a href="">Kem dưỡng da</a>
                            <i class="icon-menu fas fa-chevron-down"></i>
                            <ul class="sub-menu">
                                <li><a href="">Kem dưỡng ban ngày</a></li>
                                <li><a href="">Kem dưỡng ban đêm</a></li>
                            </ul>
                        </li>
                        <li><a href="">Kem chống nắng</a></li>
                        <li><a href="">Sữa tắm</a></li>
                        <li><a href="">Sữa rửa mặt</a></li>
                    </ul>
                </div>
                <div class="price-range">
                    <h5>Khoảng giá</h5>
                    <ul>
                        <li>
                            <label for="filter-less-100">
                            <input type="radio" id="filter-less-100" name="filter-price" value="0-100000">
                            <i class="fa"></i>
                            Giá dưới 100.000đ
                            </label>
                        </li>
                        <li>
                            <label for="filter-100-200">
                            <input type="radio" id="filter-100-200" name="filter-price" value="100000-200000">
                            <i class="fa"></i>
                            100.000đ - 200.000đ
                            </label>
                        </li>
                        <li>
                            <label for="filter-200-300">
                            <input type="radio" id="filter-200-300" name="filter-price" value="200000-300000">
                            <i class="fa"></i>
                            200.000đ - 300.000đ
                            </label>
                        </li>
                        <li>
                            <label for="filter-300-500">
                            <input type="radio" id="filter-300-500" name="filter-price" value="300000-500000">
                            <i class="fa"></i>
                            300.000đ - 500.000đ
                            </label>
                        </li>
                        <li>
                            <label for="filter-500-1000">
                            <input type="radio" id="filter-500-1000" name="filter-price" value="500000-1000000">
                            <i class="fa"></i>
                            500.000đ - 1.000.000đ
                            </label>
                        </li>
                        <li>
                            <label for="filter-greater-1000">
                            <input type="radio" id="filter-greater-1000" name="filter-price" value="1000000-greater">
                            <i class="fa"></i>
                            Giá trên 1.000.000đ 
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="tag">
                    <div class="tag1">
                        <a href="" class="tag-content">sữa tắm trắng</a>
                        <a href="" class="tag-content">kem dưỡng</a>
                    </div>
                    <div class="tag2">
                        <a href="" class="tag-content">kem chống nắng</a>
                        <a href="" class="tag-content">kem mặt</a>
                    </div>
                    <div class="tag3">
                        <a href="" class="tag-content">hazeline</a>
                        <a href="" class="tag-content">sữa rửa mặt</a>
                    </div>
                </div>
            </div>
        </aside>
        <div class="col-md-9 product-detail">
            <div class="row product-info">
                <div class="col-md-6">
                    <img data-zoom-image="./img/frontend/kemLamSangVungDaBikini.jpg" class="img-responsive thumbnail main-image-thumbnail" src="./img/frontend/kemLamSangVungDaBikini.jpg" alt="">
                    <div class="product-detail-carousel-slider">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag">
                            
                            
                            
                        <div class="owl-stage-outer"><div class="owl-stage" style="width: 420px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;"><div class="owl-item active" style="width: 129.667px; margin-right: 10px;"><div class="item thumbnail"><img src="./img/frontend/kemLamSangVungDaBikini.jpg" alt=""></div></div><div class="owl-item active" style="width: 129.667px; margin-right: 10px;"><div class="item thumbnail"><img src="./img/frontend/beaumoreContourEyeCream.jpg" alt=""></div></div><div class="owl-item active" style="width: 129.667px; margin-right: 10px;"><div class="item thumbnail"><img src="./img/frontend/kemChongNangBeaumore4in1.jpg" alt=""></div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="product-name">Kem làm sáng vùng da bikini Beaumore- 50ml</h5>
                    <div class="brand">
                        <span>Nhãn hàng: </span> <span>REDWIN</span> 
                    </div>
                    <div class="product-status"> 
                        <span>Trạng thái: </span>
                        <span class="label-warning">Hết hàng</span>
                    </div>
                    <div class="product-item-price">
                        <span>Giá: </span>
                        <span class="product-item-discount">849,000₫</span>            
                    </div>
                    <div class="cart icon">
                        <a class="btn btn-outline-inverse btn-cart" product-id="2" href="javascript:void(0)" title="Thêm vào giỏ">
                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row product-description">
                <div class="col-xs-12">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#product-description" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a>
                            </li>
                            <li role="presentation">
                                <a href="#product-comment" aria-controls="tab" role="tab" data-toggle="tab">Đánh giá</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="product-description">   
                            <p>Mô tả chi tiết</p>
                            <p>– Với chiết từ lá dâu tằm, chất Arbutin trong quả dâu gấu cùng các thành phần thảo dược thiên nhiên giúp tăng cường hàng rào biểu bì, ngăn ngừa lão hóa da</p>

                            <p>– Làm da trắng sáng, giữ ẩm và tăng độ đàn hồi cho da</p>

                            <p>– Diệt khuẩn, kháng viêm, làm mịn và sáng vùng bikini</p>

                            <p>– Tăng cường hàng rào biểu bì, giữ ẩm, ngăn ngừa lão hóa da</p>

                            <p>– Tăng dộ đàn hồi cho da, mang lại vẻ sáng và mềm mại cho da</p>

                            <p>– Làm sáng da bằng cách ức chế sự hình thành của Melanin</p>

                            <p>– Chăm sóc da bị kích ứng và tấy đỏ, chống bong tróc. Giúp làm giảm các ban đỏ gây ra bởi tia UV cháy nắng.</p>
                        
                            </div>
                            <div role="tabpanel" class="tab-pane" id="product-comment">
                                <form class="form-comment" action="" method="POST" role="form">
                                    <label>Đánh giá của bạn</label>
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" value="3">
                                        <div class="rating-container rating-md rating-animate"><div class="rating-stars" title="Four Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 80%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="rating-input" name="rating" type="text" title="" value="4"></div></div>
                                        <input type="text" class="form-control" id="" name="fullname" placeholder="Tên *" required="">
                                        <input type="email" name="email" class="form-control" id="" placeholder="Email *" required="">
                                        <textarea name="description" id="input" class="form-control" rows="3" required="" placeholder="Nội dung *"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                                <div class="comment-list">
                                    <hr>
                                    <span class="date pull-right">2019-11-29 16:11:07</span>
                                    <div class="rating-container rating-md rating-animate rating-disabled"><div class="rating-stars" title="Four Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 80%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="answered-rating-input rating-input" name="rating" type="text" title="" value="4" readonly="readonly"></div></div>
                                    <span class="by">abc</span>
                                    <p>test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-related equal">
                <div class="col-md-12">
                    <h4 class="text-center">Sản phẩm liên quan</h4>
                    <div class="owl-carousel owl-theme owl-loaded owl-drag">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    <div class="owl-stage-outer"><div class="owl-stage" style="width: 3432px; transform: translate3d(-858px, 0px, 0px); transition: all 0s ease 0s;"><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemNenTrangDiemDuongDaSandrasBB.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml">Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">321,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="11" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/nhamSamSandrasBeauty20g.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g ">Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g </a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">380,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="13" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/beaumoreContourEyeCream.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g">Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">300,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="14" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemGiaiDocToPh20ml.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem giải độc tố pH Beaumore- 20ml">Kem giải độc tố pH Beaumore- 20ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">239,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="18" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemTrangDaLinhChiDongTrungHaThao.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g">Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">905,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="20" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemLuaLamDepDaBeaumore.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem lụa làm đẹp da Beaumore- 30ml">Kem lụa làm đẹp da Beaumore- 30ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">1,500,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="5" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemLamDepTucThiInstantBeauMore.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm đẹp tức thì  Instant Beaumore">Kem làm đẹp tức thì  Instant Beaumore</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">762,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="6" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/suaTamSandrasShowerGel.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa tắm Sandras Shower Gel">Sữa tắm Sandras Shower Gel</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">180,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="7" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/suaDuongTheSandraschai88ml.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa dưỡng thể Sandras chai 88ml">Sữa dưỡng thể Sandras chai 88ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">180,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="8" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemDuongTrangDaNgayVaDem.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem Dưỡng Trắng Da Ngày vs Đêm">Kem Dưỡng Trắng Da Ngày vs Đêm</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">265,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="10" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemNenTrangDiemDuongDaSandrasBB.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml">Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">321,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="11" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/nhamSamSandrasBeauty20g.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g ">Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g </a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">380,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="13" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/beaumoreContourEyeCream.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g">Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">300,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="14" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemGiaiDocToPh20ml.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem giải độc tố pH Beaumore- 20ml">Kem giải độc tố pH Beaumore- 20ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">239,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="18" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemTrangDaLinhChiDongTrungHaThao.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g">Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">905,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="20" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemLuaLamDepDaBeaumore.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem lụa làm đẹp da Beaumore- 30ml">Kem lụa làm đẹp da Beaumore- 30ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">1,500,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="5" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemLamDepTucThiInstantBeauMore.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm đẹp tức thì  Instant Beaumore">Kem làm đẹp tức thì  Instant Beaumore</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">762,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="6" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/suaTamSandrasShowerGel.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa tắm Sandras Shower Gel">Sữa tắm Sandras Shower Gel</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">180,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="7" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/suaDuongTheSandraschai88ml.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa dưỡng thể Sandras chai 88ml">Sữa dưỡng thể Sandras chai 88ml</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">180,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="8" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 161.6px; margin-right: 10px;"><div class="item thumbnail">
                            <div class="product-container">
                                <div class="image">
                                    <img class="img-responsive" src="./img/frontend/kemDuongTrangDaNgayVaDem.jpg" alt="">
                                </div>
                                <div class="product-meta">
                                    <h5 class="name">
                                        <a class="product-name" href="chi-tiet-san-pham.html" title="Kem Dưỡng Trắng Da Ngày vs Đêm">Kem Dưỡng Trắng Da Ngày vs Đêm</a>
                                    </h5>
                                    <div class="product-item-price">
                                        <span class="product-item-discount">265,000₫</span>            
                                    </div>
                                </div>
                                <div class="button-product-action clearfix">
                                    <div class="cart icon">
                                        <a class="btn btn-outline-inverse buy" product-id="10" href="javascript:void(0)" title="Thêm vào giỏ">
                                        Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="quickview icon">
                                        <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                        Xem chi tiết <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection