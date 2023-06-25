<?php

namespace App\Models\Products;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\ProductPromotion;
use App\Models\Attachment;
use App\Models\Tag;

trait ProductRelationship
{
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
}
