<header>
    <!-- use for ajax -->
    <input type="hidden" id="reference" value=""> 
    <!-- Top Navbar -->
    <div class="top-navbar container-fluid">
        <div class="menu-mb">
            <a href="javascript:void(0)" class="btn-close" onclick="closeMenuMobile()">×</a>
            <a class="active" href="index.html">Trang chủ</a>
            <a href="san-pham.html">Sản phẩm</a>
            <a href="chinh-sach-doi-tra.html">Chính sách đổi trả</a>
            <a href="chinh-sach-thanh-toan.html">Chính sách thanh toán</a>
            <a href="chinh-sach-giao-hang.html">Chính sách giao hàng</a>
            <a href="lien-he.html">Liên hệ</a>
        </div>
        <div class="row">
            <div class="hidden-lg hidden-md col-sm-2 col-xs-1">
                <span class="btn-menu-mb" onclick="openMenuMobile()"><i class="glyphicon glyphicon-menu-hamburger"></i></span>
            </div>
            <div class="col-md-6 hidden-sm hidden-xs">
                <ul class="list-inline">
                    <li><a href="https://www.facebook.com/HocLapTrinhWebTaiNha.ThayLoc"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-10 col-xs-11">
                <ul class="list-inline pull-right top-right">
                    <li>
                        <a href="{{ route('frontend.auth.login') }}">Login</a>
                    </li>
                    <li class="account-login">
                        <a href="javascript:void(0)" class="btn-register">Đăng Ký</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="btn-login">Đăng Nhập  </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End top navbar -->
    <!-- Header -->
    <div class="container">
        <div class="row">
            <!-- LOGO -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 logo">
                <a href="#"><img src="./img/frontend/goda450x170_1.jpg" class="img-responsive"></a>
            </div>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs call-action">
                <a href="#"><img src="./img/frontend/godakeben450x170.jpg" class="img-responsive"></a>
            </div>
            <!-- HOTLINE AND SERCH -->
            <div class="col-lg-4 col-md-4 hotline-search">
                <div>
                    <p class="hotline-phone"><span><strong>Hotline: </strong><a href="tel:1900888000">1900888000</a></span></p>
                    <p class="hotline-email"><span><strong>Email: </strong><a href="mailto:abc@gmail.com">abc@gmail.com</a></span></p>
                </div>
                <form class="header-form" action="">
                    <div class="input-group">
                        <input type="search" class="form-control search" placeholder="Nhập từ khóa tìm kiếm" name="search" autocomplete="off" value="">
                        <div class="input-group-btn">
                            <button class="btn bt-search bg-color" type="submit"><i class="fa fa-search" style="color:#fff"></i>
                            </button>
                        </div>
                        <input type="hidden" name="c" value="product">
                        <input type="hidden" name="a" value="list">
                    </div>
                    <div class="search-result">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End header -->
</header>