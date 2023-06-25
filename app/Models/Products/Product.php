<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFeatureImage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use ProductAccessorMutator, ProductRelationship;

    use HasFeatureImage;

    use HasFactory;

    use SoftDeletes;// add soft delete

    protected $guarded = ['id'];            // $guarded  đối ngược với fillable là khai báo trường nào thì khoá trường đó lại => thường hay sử dụng        
        
    protected $appends = [
        'feature_image',
        'price_label',
    ];

    // protected $table =  'cms_products_manufacture';     // trường hợp tên table đặt tên khác với tên Models (insert file SQL vào)
    
    // protected $fillable = [             // khai báo trường nào thì cho trường đó sử dụng        
    //     'parent_id',
    //     'name',
    //     'slug',
    //     'meta_title',
    //     'meta_keyword',
    //     'meta_description',
    // ];
    // protected  $primaryKey =  "id";

    // public $timestamps = false;         // Nếu không thêm 2 trường create_at và update_date (báo lỗi)

    // Định nghĩa trường is_feature và các ràng buộc liên quan đến nó
    // protected $casts = [
    //     'is_feature' => 'boolean', // Kiểu dữ liệu là boolean
    // ];

    // // Các ràng buộc liên quan đến trường is_feature
    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->is_feature = $model->is_feature ?? false;
    //     });
    // }
}
