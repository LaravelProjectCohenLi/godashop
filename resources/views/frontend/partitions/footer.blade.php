<footer class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-4 list">
                        <div class="footerLink">
                            <h4>Danh mục</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Kem Chống Nắng </a></li>
                                <li><a href="#">Kem Dưỡng Da </a></li>
                                <li><a href="#">Kem Trị Mụn </a></li>
                                <li><a href="#">Kem Trị Thâm Nám </a></li>
                                <li><a href="#">Sữa Rửa Mặt </a></li>
                                <li><a href="#">Sữa Tắm </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-4 list">
                        <div class="footerLink">
                            <h4>Liên kết </h4>
                            <ul class="list-unstyled">
                                <li><a href="san-pham.html">Sản phẩm </a></li>
                                <li><a href="chinh-sach-doi-tra.html">Chính sách đổi trả</a></li>
                                <li><a href="chinh-sach-thanh-toan.html">Chính sách thanh toán</a></li>
                                <li><a href="chinh-sach-giao-hang.html">Chính sách giao hàng </a></li>
                                <li><a href="lien-he.html">Liên hệ </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-4 list">
                        <div class="footerLink">
                            <h4>Liên hệ với chúng tôi </h4>
                            <ul class="list-unstyled">
                                <li>Phone: 190011111</li>
                                <li><a href="mailto:abc@gmail.com">Mail: abc@gmail.com</a></li>
                            </ul>
                            <ul class="list-inline">
                                <li><a href="https://www.facebook.com/HocLapTrinhWebTaiNha.ThayLoc"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 list">
                        <div class="newsletter clearfix">
                            <h4>Bản tin</h4>
                            <p>Nhập Email của bạn để chúng tôi cung cấp thông tin nhanh nhất cho bạn về những sản phẩm mới!!</p>
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nhập email của bạn.." name="email">
                                    <button type="submit" class="btn btn-primary send pull-right">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<!-- BACK TO TOP -->
<div class="back-to-top" class="bg-color">▲</div>
<!-- END BACK TO TOP -->
<!-- REGISTER DIALOG -->
<div class="modal fade" id="modal-register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <livewire:frontend.register></livewire:frontend.register>
        </div>
    </div>
</div>
<!-- END REGISTER DIALOG -->
<!-- LOGIN DIALOG -->
<div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center">Đăng nhập</h3>
                <!-- Google login -->
                <br>
                <div class="text-center">
                    <a class="btn btn-primary google-login" href="#"><i class="fab fa-google"></i></i> Đăng nhập bằng Google</a>
                    <!-- Facebook login -->
                    <a class="btn btn-primary facebook-login" href="#"><i class="fab fa-facebook-f"></i> Đăng nhập bằng Facebook</a>
                </div>
            </div>
            <form action="#" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <input type="hidden" name="reference" value="">                          
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button><br>
                    <div class="text-left">
                        <a href="javascript:void(0)" class="btn-register" >Bạn chưa là thành viên? Đăng kí ngay!</a>
                        <a href="javascript:void(0)" class="btn-forgot-password">Quên Mật Khẩu?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END LOGIN DIALOG -->
<!-- FORTGOT PASSWORD DIALOG -->
<div class="modal fade" id="modal-forgot-password" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center">Quên mật khẩu</h3>
            </div>
            <form action="#" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="reference" value="">
                    <button type="submit" class="btn btn-primary">GỬI</button><br>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END FORTGOT PASSWORD DIALOG -->
<!-- CART DIALOG -->
{{-- <livewire:frontend.cart-list></livewire:frontend.cart-list> --}}
{{-- <x-product-cart></x-product-cart> --}}
<div class="modal fade" id="modal-cart-detail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <livewire:frontend.cart-list></livewire:frontend.cart-list>
        </div>
    </div>
</div>
<!-- END CART DIALOG -->
<!-- Facebook Messenger Chat -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v4.0'
    });
    };
    
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Your customer chat code -->
<div class="fb-customerchat"
    attribution=setup_tool
    page_id="112296576811987"
    logged_in_greeting="Chào bạn, bạn muốn mua sản phẩm nào bên GodaShop.com"
    logged_out_greeting="Chào bạn, bạn muốn mua sản phẩm nào bên GodaShop.com">
</div>
<!-- End Facebook Messenger Chat -->