<?php

namespace App\Repositories;

use App\Models\Products\Product;
use Illuminate\Support\Facades\File;

class ControlPriceRepository
{
    /**
     * @var Product
     */

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;   
    }
    
    // Random Price
    public function RandomPrice()
    {
        $products = $this->model->all();

        foreach ($products as $product)
        {
            $randomPrice = random_int(150000,1000000); 
            $product->price = ($randomPrice); 
            $product->save(); 
        }
        session()->flash('flash_success', 'Random lại giá bán thành công');
    }

    // Reset Price
    public function ResetPrice()
    {
        $products = $this->model->all();

        foreach ($products as $product)
        {
            $resetPrice = $product->price = 500000;
            $product->price = ($resetPrice); 
            $product->save(); 
        }
        session()->flash('flash_success', 'Reset 500k thành công');
    }

    // All Increase Price
    public function AllIncreasePrice()
    {
        $products = $this->model->all();

        foreach ($products as $product)
        {
            $salePrice = $product->price * 1.1;       // tăng 10%
            $product->sale_price = $salePrice;
            $product->save(); 
        }
        session()->flash('flash_success', 'Tăng giá bán thành công');
    }

    // All Reduce Price
    public function AllReducePrice()
    {
        $products = $this->model->all();

        foreach ($products as $product)
        {
            $salePrice = $product->price * 0.9;         // giảm 10%
            $product->sale_price = $salePrice;
            $product->save(); 
        }

        session()->flash('flash_success', 'Giảm giá bán thành công');
    }

    // Action Increase Price
    public function ActionIncreasePrice($id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            session()->flash('flash_error', 'Sản phẩm không tồn tại.');
            return;
        }

        $salePrice = $product->price * 1.1;         // tăng giá 10%
       

        if ($product->sale_price == $salePrice) {
            session()->flash('flash_error', 'Sản phẩm đã cập nhật giá bán.');
            return;
        }

        $product->sale_price = $salePrice;
        $product->save();
        session()->flash('flash_success', 'Cập nhật giá bán thành công');
    }

    // Action Reduce Price
    public function ActionReducePrice($id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            session()->flash('flash_error', 'Sản phẩm không tồn tại.');
            return;
        }

        $salePrice = $product->price * 0.9;         // giảm giá 10%
       

        if ($product->sale_price == $salePrice) {
            session()->flash('flash_error', 'Sản phẩm đã cập nhật giá bán.');
            return;
        }

        $product->sale_price = $salePrice;
        $product->save();
        session()->flash('flash_success', 'Giảm giá bán thành công');
    }
}