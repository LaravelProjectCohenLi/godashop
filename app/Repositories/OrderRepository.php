<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * @var Order
     */

    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;   
    }

    public function findById($id)
    {
        return $this->model->with('orderDetail')->findOrFail($id);
    }

    public function findIdDel($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        $order = $this->model->findOrFail($id);

        // Xóa các bản ghi trong bảng liên kết giữa bảng `order` và `order_details`

        if ($order->status == 4 || $order->status == 5) {
            $order->delete();
            $order->orderDetail()->where('order_id', $order->id)->delete();
            session()->flash('flash_success', 'Xóa Order thành công!');
        }
        else{
            session()->flash('flash_danger', 'Order không thể xóa');
        }
    }

    
}