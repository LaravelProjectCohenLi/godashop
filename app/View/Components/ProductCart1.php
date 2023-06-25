<?php

namespace App\View\Components;

use App\Services\CartService;
use Illuminate\View\Component;

class ProductCart extends Component
{
    protected $cartService;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $cartService = app(CartService::class);
        $cartService = $this->cartService;

        return view('components.frontend.product-cart', [
            // 'products' => $cartService->all(),
            // 'totalPrice' => $cartService->totalPrice(),
        ]);
    }
}
