<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryRepository extends BaseRepository
{
    /**
     * @var Category
     */

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;   
    }

    public function getAllCates()
    {
        $cates = [];

        $this->chunk(100, function ($chunk) use (&$cates) {
            foreach ($chunk as $cate) {
                $cates[] = $cate;
            }
        });

        return $cates;
    }

    // get menu Category
    public function getCategoryByMenu($limit=10)
    {
        return $this->model->with('sub')->limit($limit)->get();
    }

    // get Feature Category
    public function getFeatureCategories($limit=5)
    {
        return $this->model->with(['products' => function($query){
            $query->inRandomOrder()->limit(8);
        }])
        ->inRandomOrder()
        ->limit($limit)
        ->get();
    }

    public function deleteByid($id)
    {
        $category = $this->model->findOrFail($id);

        // Xóa các bản ghi trong bảng liên kết giữa bảng `categories` và `tags`
        $category->tags()->detach();

        // Xóa các bản ghi trong bảng liên kết giữa bảng `tags` và `categories`
        foreach ($category->tags as $tag) {
            $tag->taggables()->where('taggable_id', $category->id)->delete();
        }

        // Xóa sản phẩm
        $category->delete();
    }
}