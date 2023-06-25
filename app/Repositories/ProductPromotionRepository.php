<?php

namespace App\Repositories;

use App\Models\ProductPromotion;
use Illuminate\Support\Facades\File;

class ProductPromotionRepository extends BaseRepository
{
    /**
     * @var ProductPromotion
     */

    protected $model;

    public function __construct(ProductPromotion $model)
    {
        $this->model = $model;   
    }

    public function delete($id)
    {
        $productpromotion = $this->model->findOrFail($id);

        foreach ($productpromotion->attachments as $attachment) {
            $attachment->delete();
        
            // Xóa file hình ảnh trong thư mục lưu trữ và bản ghi nếu tồn tại
            $imagePath = public_path('attachments/' . $attachment->file_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        
        $productpromotion->delete();
        session()->flash('flash_success', 'Xóa thành công!');
    }
}