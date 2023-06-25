<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Models\Order;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    
    public function index()
    {
        return view('backend.orders.index');
    }

    public function show($id)
    {
        return view('backend.orders.show', [
            'order' => $this->orderRepository->findById($id)
        ]);
    }

    public function destroy($id)
    {
        $result = $this->orderRepository->delete($id);
        return redirect()->back();
    }
}
