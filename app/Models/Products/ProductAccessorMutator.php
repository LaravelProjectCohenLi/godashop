<?php

namespace App\Models\Products;

trait ProductAccessorMutator
{
    // copy a record
    public function duplicate()
    {
        $clone = $this->replicate();
        $clone->id = null;
        $clone->save();
        return $clone;
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
