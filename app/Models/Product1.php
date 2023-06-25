<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFeatureImage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use HasFeatureImage;

    use SoftDeletes;

    // protected $table =  'cms_products_manufacture';     // trường hợp tên table đặt tên khác với tên Models (insert file SQL vào)
    
    // protected $fillable = [             // khai báo trường nào thì cho trường đó sử dụng        
    //     'parent_id',
    //     'name',
    //     'slug',
    //     'meta_title',
    //     'meta_keyword',
    //     'meta_description',
    // ];

    protected $guarded = ['id'];            // $guarded  đối ngược với fillable là khai báo trường nào thì khoá trường đó lại => thường hay sử dụng        
        
    // public $timestamps = false;         // Nếu không thêm 2 trường create_at và update_date (báo lỗi)

    // relationship 1 1 with Category

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

    protected $appends = [
        'feature_image',
        'price_label',
    ];

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function ProductPromotion()
    {
        return $this->hasMany(ProductPromotion::class);         // relationship 1-N with ProductPromotion
    }

    public function category()
    { 
        return $this->belongsTo(Category::class);         
    }

    // relationship 1 N with attachment with type Morph
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    // relationship 1 N with attachment with type Morph
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // get Feature Product

    public function scopeIsFeature($query)
    {
        $query->where('is_feature', true);
    }

    // get slug

    public function getSlugUrlAttribute()
    {
        return $this->slug . '-product-' . $this->id . '.html';
    }

    // get price

    public function getPriceLabelAttribute()                // đặt tên hàm phải đúng chuẩn
    {
        return number_format($this->price) . 'đ';
    }

    // get sale price

    public function getPriceSaleLabelAttribute()            // đặt tên hàm phải đúng chuẩn
    {
        return number_format($this->sale_price) . 'đ';
    }
}
