<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Product;

class Category extends Model
{
    use HasFactory;

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

    // relationship 1 N with Product
    public function products()
    {
        return $this->hasMany(Product::class);         
    }

    // // relationship 1 N with attachment with type Morph
    // public function attachment()
    // {
    //     return $this->morphOne(Attachment::class, 'attachable');
    // }

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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // menu product
    public function sub()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    // link category

    public function getSlugUrlAttribute()
    {
        return url($this->slug . '_' . $this->id . '.html');
    }

    public function getFeatureImageAttribute()
    {
        if ($this->attachments->count() === 0) {
            return url('img/frontend/beaumoreSecretWhiteningCream10g.jpg');
        }

        return url('storage/' . $this->attachments->first()->file_path);
    }

}
