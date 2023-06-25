<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class CartService
{
    const CART_KEY = 'cart';

    protected $carts;

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

        if (session()->has(static::CART_KEY)) {
            $this->carts = collect(session(static::CART_KEY));
        } else {
            $this->carts = collect();
        }
    }

    // load giỏ hàng từ session
    protected function loadCart()
    {
        if (session()->has(static::CART_KEY)) {
            $this->carts = collect(session(static::CART_KEY));
        } else {
            $this->carts = collect();
        }
    }

    // lưu giỏ hàng vào session
    protected function saveCart()
    {
        session()->put(static::CART_KEY, $this->carts);
    }

    // cập nhật số lượng hàng theo từng Item (javascript)
    public function updateQuantity($id, $qty)
    {
        if ($qty <= 0) {
            return;
        }
        
        // hàm each() được sử dụng để lặp qua các phần tử của đối tượng $this->carts. 
        // Với mỗi phần tử, nếu id của phần tử này trùng với id được truyền vào hàm, 
        // số lượng qty của phần tử này sẽ được cập nhật bằng giá trị mới $qty.

        $this->carts->each(function ($item) use ($id, $qty) {
            if ($item->id == $id) {
                $item->qty = $qty;
            }
        });

        $this->saveCart();
    }

    // insert sản phẩm vào giỏ hàng
    public function updateOrInsert($id)
    {
        $product = $this->productRepository->findById($id);
        if (!$product) {
            return;
        }
        $existingItem = $this->carts->firstWhere('id', $id);
        
        if ($existingItem) {
            // sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $existingItem->qty += 1;
        } else {
            // sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            $product->qty = 1;
            $this->carts->push($product);
        }
        
        $this->saveCart();

        if ($this->carts->isEmpty()) {
            session()->forget(static::CART_KEY);
        }
    }

    // kiểm tra sản phẩm (check id) có tồn tại trong giỏ hàng hay ko
    public function exists($id)
    {
        return $this->carts->where('id', $id)->count() > 0;
        // return $this->carts->contains('id', $id);
    }

    // lấy giỏ hàng (trả về toàn bộ có trong giỏ hàng)
    public function all()
    {
        return $this->carts;
    }

    // tính tổng giá tiền
    public function totalPrice()
    {
        return number_format($this->carts->sum(function($item) {
            return $item->qty * $item->price;
        }));

        // $total = 0;

        // $this->carts->each(function($item) use(&$total) {
        //     if (is_numeric($item->qty)) {
        //         $total += $item->price * $item->qty;
        //     }
        // });

        // return number_format($total);
    }

    // cập nhật số lượng hàng theo từng Item (javascript)
    // public function updateQuantity($id, $qty)
    // {
    //     $this->carts->each(function ($item) use ($id, $qty) {
    //         if ($item->id == $id) {
    //             $item->qty = $qty;
    //         }
    //     });

    //     $this->saveCart();
    // }

    // public function updateOrInsert($id)
    // {
    //     if ($this->exists($id)) { // Update số lượng của sản phẩm vào giỏ hàng
    //         $this->carts->each(function ($item) use ($id) {
    //             if ($item->id == $id) {
    //                 $item->qty += 1;
    //             }
    //         });
    //     } else { // Insert thông tin sản phẩm vào giỏ hàng
    //         $product = $this->productRepository->findById($id);
    //         $product->qty = 1;
    //         $this->carts->push($product);
    //     }

    //     $this->saveCart();
    // }

    // get total in cart
    public function total()
    {
        return $this->carts->sum('qty');
    }

    // xóa từng Item trong giỏ hàng 
    public function removeItem($id)
    {
        // sử dụng hàm reject để xóa Item trong giỏ hàng
        // xóa những sản phẩm có id bằng id truyền vào
        $this->carts = $this->carts->reject(function($product) use ($id){
            return $product->id == $id;
        });

        $this->saveCart();
    }

    // Sau khi order xong sẽ hủy all
    public function destroy()
    {
        session()->flush();
    }
    
    // save vào giỏ hàng
    // protected function saveCart()
    // {
    //     session()->put(static::CART_KEY, $this->carts);
    // }
}