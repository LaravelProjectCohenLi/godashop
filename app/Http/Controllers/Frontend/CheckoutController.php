<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Services\CartService;
use App\Models\District;
use App\Models\Ward;
use App\Models\Province;
use App\Models\Customer;
use App\Models\Order;
use App\Repositories\DistrictRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\WardRepository;
use App\Http\Requests\Frontend\CheckoutRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;
    protected $wardRepository;

    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository,
        WardRepository $wardRepository,
        )
    {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
        $this->wardRepository = $wardRepository;
    }

    public function index()
    {
        return view('frontend.checkouts.index', [
            'products' => app(CartService::class)->all(),
            'totalPrice' => app(CartService::class)->totalPrice(),
            // 'districts' => District::all(),
            // 'wards' => Ward::all(),
            // 'provinces' => Province::all(),
            'districts' => $this->districtRepository->getAll(),
            'provinces' => $this->provinceRepository->getAll(),
            'wards' => $this->wardRepository->getAll(),
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        DB::beginTransaction();

        $cartService = app(CartService::class)->all();

        if (empty($cartService->all())) {
            return redirect()->back()->with('error', 'Bạn không có sản phẩm nào trong giỏ hàng');
        }

        $district = District::where('code', $request->district)->first();

        $ward = Ward::where('code', $request->ward)->first();

        $province = Province::where('code', $request->province)->first();
            
        $address = $request->address . ', ' . $ward->name . ', ' . $district->name . ', ' . $province->name;

        // dd($address);

        try {
            $customer = Customer::create([
                'name' => $request->fullname,
                'phone' => $request->mobile,
                'address' => $address,
            ]);

            $order = Order::create([
                'code' => time(),
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $customer->phone,
                'payment_method_id' => $request->payment_method,
                'status' => Order::STATUS['created'],
                'shipping_address' => $address,
                'shipping_fee' => 0,
            ]);

            $cartService = app(CartService::class);
            $products = $cartService->all();

            foreach ($products as $product) {
                $order->orderDetail()->save(new OrderDetail(
                    [
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_price' => $product->price,
                        'quantity' => $product->qty
                    ]
                ));
            }

            $cartService->destroy();
            DB::commit();

            return redirect()->back()->with('success', 'Đặt hàng thành công');

        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}