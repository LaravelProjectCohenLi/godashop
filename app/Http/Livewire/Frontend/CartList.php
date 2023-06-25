<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Services\CartService;

class CartList extends Component
{
    public string $removeItemMessageSuccess = '';
    public $totalPrice;
    public $products = [];
    // public $loading = true;

    public function mount()
    {
        $cartService = app(CartService::class);
        $this->products = $cartService->all();
        $this->totalPrice = $cartService->totalPrice();
    }

    public function render()
    {
        return view('livewire.frontend.cart-list');
    }

    public function deleteProductInCart($productId)
    {
        try {
            $cartService = app(CartService::class);
            $cartService->removeItem($productId);
            $this->products = $cartService->all();
            $this->totalPrice = $cartService->totalPrice();
            $this->removeItemMessageSuccess = 'Xoá sản phẩm trong giỏ thành công';
        } catch (\Exception $e) {
            $this->removeItemMessageSuccess = '';
        }
    }

    public function updateQuantity($productId)
    {
        $cartService = app(CartService::class);
        $item = $this->products->where('id', $productId)->first();
        $cartService->updateQuantity($productId, $item['qty']);
        $this->products = $cartService->all();
        $this->totalPrice = $cartService->totalPrice();
        $this->removeItemMessageSuccess = 'Cập nhật số lượng trong giỏ thành công';
    }
}