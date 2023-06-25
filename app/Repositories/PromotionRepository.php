<?php

namespace App\Repositories;

use App\Models\Promotion;
use Illuminate\Support\Facades\File;

class PromotionRepository extends BaseRepository
{
    /**
     * @var Promotion
     */

    protected $model;

    public function __construct(Promotion $model)
    {
        $this->model = $model;   
    }

    public function getAllPromotion()
    {
        $promotions = [];

        $this->chunk(100, function ($chunk) use (&$promotions) {
            foreach ($chunk as $promotion) {
                $promotions[] = $promotion;
            }
        });

        return $promotions;
    }

    public function discount()
    {
        
    }

    public function delete($id)
    {
        $promotion = $this->model->findOrFail($id);
        $productPromotions = $promotion->ProductPromotion();
        
        // Xóa bản ghi trong table attachments của promotion
        foreach ($promotion->attachments as $attachment) {
            $attachment->delete();
        
            // Xóa file hình ảnh trong thư mục lưu trữ và bản ghi nếu tồn tại
            $imagePath = public_path('attachments/' . $attachment->file_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        // Xóa các productPromotion liên quan đến promotion
        // $productPromotions->where('promotion_id', $promotion->id)->get()->each(function ($productPromotion) {
        //     // Xóa các bản ghi trong table attachments của productPromotion
        //     foreach ($productPromotion->attachments as $attachment) {
        //         $attachment->delete();
        //     }

        //     // Xóa productPromotion và các bản ghi trong bảng trung gian liên quan
        //     // $productPromotion->promotion()->detach();
        //     // $productPromotion->delete();
        // });

    // Xóa các productPromotion liên quan đến promotion
        $productPromotions->where('promotion_id', $promotion->id)->delete();

        $promotion->delete();
        session()->flash('flash_success', 'Xóa thành công!');
    }   
}