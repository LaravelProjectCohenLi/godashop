<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFeatureImage;
use App\Models\Products\Product;

class Promotion extends Model
{
    use HasFactory;

    use HasFeatureImage;

    protected $guarded = ['id'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function ProductPromotion()
    {
        return $this->hasMany(ProductPromotion::class);         // relationship 1-N with ProductPromotion
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
