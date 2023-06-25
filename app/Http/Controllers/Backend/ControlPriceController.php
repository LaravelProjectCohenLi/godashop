<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ControlPriceRepository;

class ControlPriceController extends Controller
{
    protected $controlPriceRepository;

    public function __construct(ControlPriceRepository $controlPriceRepository)
    {
        $this->controlPriceRepository = $controlPriceRepository;
    }
    
    // Reset Price
    public function reset_price()
    {
        $result = $this->controlPriceRepository->ResetPrice();

        return redirect()->back();
    }

    // Random Price
    public function random_price()
    {
        $result = $this->controlPriceRepository->RandomPrice();

        return redirect()->back();
    }

    // Increase Price
    public function increase_price()
    {
        $result = $this->controlPriceRepository->AllIncreasePrice();

        return redirect()->back();
    }

    // Reduce Price
    public function reduce_price()
    {
        $result = $this->controlPriceRepository->AllReducePrice();

        return redirect()->back();
    }

    // Up_price
    public function up_price(string $id)
    {
        $result = $this->controlPriceRepository->ActionIncreasePrice($id);

        return redirect()->back();
    }

    // Downd_price
    public function downd_price(string $id)
    {
        $result = $this->controlPriceRepository->ActionReducePrice($id);

        return redirect()->back();
    }
}
