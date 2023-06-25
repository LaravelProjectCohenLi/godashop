<?php

namespace App\Repositories;

use App\Models\Products\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    /**
     * @var Product
     */

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;   
    }

    // get Feature 

    public function getByFeature($limit)
    {
        return $this->model->isFeature()->with('attachments')->limit($limit)->get();
    }

    // get New Product
    public function getNewest($limit=12)
    {
        return $this->model->with('attachments')->inRandomOrder()->limit($limit)->get();
    }

    // phân trang

    public function paginate(array $inputs, $limit=15)
    {
        $query = $this->model->query();

        // call function sortByRangePrice
        $query = $this->sortByRangePrice($query);
        
        // call function filterByTag
        $query = $this->filterByTag($query);
        
        // call function sortProduct
        $query = $this->orderByProduct($query);

        return $query->paginate($limit);
    }

    // Phần Category

    public function getByCategoryId($categoryId, $limit=15)
    {
        $query = $this->model->where('category_id', $categoryId);

        // call function filterByTag
        $query = $this->filterByTag($query);

        // call function sortByRangePrice
        $query = $this->sortByRangePrice($query);

        // call function orderByProduct
        $query = $this->orderByProduct($query);
        
        return $query->paginate($limit);
    }

    // function xử lý tag
    protected function filterByTag($query) {

        $inputs = request()->all();
        if (!empty($inputs['tag_id'])) {
            $query->whereHas('tags', function($query) use ($inputs) {
                $query->where('tags.id', $inputs['tag_id']);
            });
        }
        return $query;
    }

    // function sortByRangePrice
    protected function sortByRangePrice($query){
        
        $inputs = request()->all();

        if (isset($inputs['from_price']) && isset($inputs['to_price'])) {

            if ($inputs['to_price'] === 'greater') {
                $query->where('price', '>=', $inputs['from_price']);
            }

            if ($inputs['to_price'] != 'greater') {
                $query->where('price', '>=', $inputs['from_price'])
                      ->where('price', '<=', $inputs['to_price']);
            } 

        }
        return $query;
    }

    // function orderByProduct
    protected function orderByProduct($query) {
        switch (request()->get('sort_by')) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'alpha-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'alpha-desc':
                $query->orderBy('name', 'desc');
                break;
            case 'created-asc':
                $query->orderBy('id', 'asc');
                break;
            case 'created-desc':
                $query->orderBy('id', 'desc');
                break;
            default:
                $query->orderBy('id', 'DESC');
        }
        return $query;
    }

    public function getAllProducts()
    {
        $products = [];

        $this->chunk(100, function ($chunk) use (&$products) {
            foreach ($chunk as $product) {
                $products[] = $product;
            }
        });

        return $products;
    }

    // get category bình thường
    // public function getProductsByCategoryId($categoryId)
    // {
    //     return $this->model->where('category_id', $categoryId)->orderBy('id', 'DESC')->paginate(10);
    // }

    // get category có thuộc tính chỉ mục category_id (Index)
    public function getProductsByCategoryId($categoryId)
    {
        $table = $this->model->getTable();
        return $this->model->where('category_id', $categoryId)
                    ->select(DB::raw("{$table}.*"))
                    ->from(DB::raw("{$table} USE INDEX (idx_category_id)"))
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
    }

    // Force delete
    public function ForceDelete($id)
    {
        // $product = $this->model->findOrFail($id);

        // // Xóa các bản ghi trong bảng liên kết giữa bảng `products` và `tags`
        // $product->tags()->detach();

        //  // Xóa các bản ghi trong bảng liên kết giữa bảng `tags` và `products`
        // foreach ($product->tags as $tag) {
        //     $tag->taggables()->where('taggable_id', $product->id)->delete();
        // }

        // foreach ($product->attachments as $attachment) {
        //     $attachment->delete();
        
        //     // Xóa file hình ảnh trong thư mục lưu trữ và bản ghi nếu tồn tại
        //     $imagePath = public_path('attachments/' . $attachment->file_path);
        //     if (File::exists($imagePath)) {
        //         File::delete($imagePath);
        //     }
        // }
        // $product->ProductPromotion()->where('product_id', $product->id)->delete();

        $force_delete = $this->model->withTrashed()->where('id', $id)->forceDelete();
        session()->flash('flash_success', 'Xóa sản phẩm vĩnh viễn thành công!');

        return $force_delete;
    }

    
 
}