@php
    $activeMenu = request()->is('san-pham.html') || request()->route()->getName() == 'frontend.category.show' ? 'header__menu-active' : '';
    $cartService = app(\App\Services\CartService::class);
@endphp
<div class="header__menu">
    <ul class="header__menu-list">
        <li class="header__menu-item">
            <a href="/" class="header__menu-link {{ request()->is('/') ? 'header__menu-active' : '' }}">Trang Chủ</a>
        </li>
        
        <li class="header__menu-item">
            <a href="san-pham.html" class="header__menu-link {{ $activeMenu }}">Sản Phẩm</a>
            <x-menu-category></x-menu-category>
        </li>
        <li class="header__menu-item ">
            <a href="chinh-sach-doi-tra.html" class="header__menu-link {{ request()->is('chinh-sach-doi-tra.html') ? 'header__menu-active' : '' }}">Chính sách đổi trả</a>
            
        </li>
        
        <li class="header__menu-item">
            <a href="chinh-sach-thanh-toan.html" class="header__menu-link {{ request()->is('chinh-sach-thanh-toan.html') ? 'header__menu-active' : '' }}">Chính sách thanh toán</a>
            
        </li>
        <li class="header__menu-item">
            <a href="chinh-sach-giao-hang.html" class="header__menu-link {{ request()->is('chinh-sach-giao-hang.html') ? 'header__menu-active' : '' }}">Chính sách giao hàng</a>
        </li>
        <li class="header__menu-item">
            <a href="lien-he.html" class="header__menu-link">Liên hệ</a>
        </li>
    </ul>
    <span class="hidden-lg hidden-md experience">Trải nghiệm cùng sản phẩm của Goda</span>
    <ul class="nav navbar-nav navbar-right header-cart">
        <li class="cart"><a href="javascript:void(0)" class="btn-cart-detail" title="Giỏ Hàng"><i class="fa fa-shopping-cart"></i> <span class="number-total-product">{{ $cartService->total() }}</span></a></li>
    </ul>
    
</div>