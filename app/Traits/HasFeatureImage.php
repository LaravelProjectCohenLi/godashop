<?php
namespace App\Traits;

trait HasFeatureImage
{
    // get image
    public function getFeatureImageAttribute()
    {
        if ($this->attachments->count() === 0) {
            return url('img/frontend/beaumoreSecretWhiteningCream10g.jpg');
        }

        return url('storage/' . $this->attachments->first()->file_path);
    }
}