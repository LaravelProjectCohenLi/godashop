<?php

namespace App\Helpers;

use App\Models\Attachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    public static function uploadImage($file, $parent, $parentClass)
    {
        if (!$file instanceof UploadedFile) {
            return; // Thoát khỏi hàm nếu biến $file không phải là đối tượng UploadedFile
        }

        $attachmentPath = null;
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $maxSize = 1024 * 1024; // 1MB

        // Check file extension
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, $allowedExtensions)) {
            throw new \InvalidArgumentException('Invalid file format. Only JPG, JPEG and PNG files are allowed.');
        }

        // Check file size
        if ($file->getSize() > $maxSize) {
            throw new \InvalidArgumentException('File size is too large. Maximum size allowed is 1MB.');
        }

        $attachmentPath = Storage::disk('public')->putFileAs(
            'attachments',
            $file,
            $file->hashName()
        );

        // Save in database
        if ($attachmentPath) {
            $parent->attachments()->save(Attachment::create([
                'attachable_type' => $parentClass,
                'attachable_id' => $parent->id,
                'file_path' => $attachmentPath,
                'file_name' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]));
        }
    }
}
