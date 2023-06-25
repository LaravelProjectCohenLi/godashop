<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ProductPromotionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionRepository;
use App\Http\Requests\Backend\ProductPromotionRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ProductPromotion;
use App\Helpers\UploadHelper;
use App\Helpers\UpdateHelper;

class ProductPromotionController extends Controller
{
    protected $productPromotionRepository;
    protected $productRepository;
    protected $promotionRepository;

    public function __construct(
        ProductPromotionRepository $productPromotionRepository, 
        ProductRepository $productRepository,
        PromotionRepository $promotionRepository
    )
    {
        $this->productPromotionRepository = $productPromotionRepository;
        $this->productRepository = $productRepository;
        $this->promotionRepository = $promotionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product_promotions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('backend.product_promotions.create', [
        'promotions' => $this->promotionRepository->getAllPromotion(),
        'products' => $this->productRepository->getAllProducts(),   
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductPromotionRequest $request)
    {
        try {
            DB::beginTransaction();

            $productpromotion = $this->productPromotionRepository->save($request->only([   
                'promotion_id',
                'product_id',
                'quatity'
            ]));

            // Start upload Image
                $file = $request->file('image');
                try {
                    UploadHelper::uploadImage($file, $productpromotion, ProductPromotion::class);
                } catch (\InvalidArgumentException $e) {
                    return redirect()->back()->with('flash_error', $e->getMessage());
                }
            // End upload Image

            DB::commit();

            return redirect()->route('admin.product_promotion.index')->with('flash_success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productpromotion = $this->productPromotionRepository->findById($id);
        return view('backend.product_promotions.show', [
            'productpromotions' => $productpromotion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productpromotion = $this->productPromotionRepository->findById($id);
        return view('backend.product_promotions.edit', [
            'productpromotions' => $productpromotion,
            'promotions' => $this->promotionRepository->getAllPromotion(),
            'products' => $this->productRepository->getAllProducts(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductPromotionRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $productpromotion = $this->productPromotionRepository->save([
                'promotion_id' => $request->input('promotion_id'),
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity'),
            ], $id);

            // Start upload Image
                UpdateHelper::processAttachment($request, $productpromotion, ProductPromotion::class);
            // End upload Image

            DB::commit();

            return redirect()->back()->with('flash_success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->productPromotionRepository->delete($id);
       return redirect()->back();
    }
}
