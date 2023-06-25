<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository;
use App\Http\Requests\Backend\PromotionRequest;
use Illuminate\Support\Facades\DB;
use App\Helpers\UploadHelper;
use App\Helpers\UpdateHelper;
use App\Models\Promotion;

class PromotionController extends Controller
{
    protected $promotionRepository;

    public function __construct(PromotionRepository $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.promotions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        try {
            DB::beginTransaction();

            $promotion = $this->promotionRepository->save([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'discount_amount' => $request->input('discount_amount'),
                // 'discount_amount' => $this->promotionRepository->discount($request->input('discount_amount')),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);

            // Start upload Image
            $file = $request->file('image');
            try {
                UploadHelper::uploadImage($file, $promotion, Promotion::class);
            } catch (\InvalidArgumentException $e) {
                return redirect()->back()->with('flash_error', $e->getMessage());
            }
            // End upload Image

            DB::commit();

            return redirect()->route('admin.promotion.index')->with('flash_success', 'Thêm mới thành công');
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
        $promotion = $this->promotionRepository->findById($id);
        return view('backend.promotions.show', [
            'promotions' => $promotion
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
        $promotion = $this->promotionRepository->findById($id);
        return view('backend.promotions.edit', [
            'promotions' => $promotion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $promotion = $this->promotionRepository->save([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'discount_amount' => $request->input('discount_amount'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date')
            ], $id);

            // Start upload Image
            UpdateHelper::processAttachment($request, $promotion, Promotion::class);
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
        $this->promotionRepository->delete($id);
        return redirect()->back();
    }
}
