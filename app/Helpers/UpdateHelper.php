<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Attachment;

class UpdateHelper
{
    public static function processAttachment(Request $request, $parent, $parentClass)
    {
        $fileInfo = $request->file('image');
        $attachmentPath = null;
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $maxSize = 1024 * 1024; // 1MB

        if ($fileInfo) {
            // Check file extension
            $extension = strtolower($fileInfo->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('flash_error', 'Invalid file format. Only JPG, JPEG and PNG files are allowed.');
            }

            // Check file size
            if ($fileInfo->getSize() > $maxSize) {
                return redirect()->back()->with('flash_error', 'File size is too large. Maximum size allowed is 1MB.');
            }

            // Xóa file hình cũ dưới local nếu tồn tại
            if ($parent->attachments->count()) {
                Storage::disk('public')->delete($parent->attachments->first()->file_path);
            }

            $attachmentPath = Storage::disk('public')->putFileAs(
                'attachments',
                $fileInfo,
                $fileInfo->hashName()
            );
        }

        // Save in database
        if ($attachmentPath) {
            $parent->attachments()->delete();
            $parent->attachments()->save(Attachment::create([
                'attachable_type' => $parentClass,
                'attachable_id' => $parent->id,
                'file_path' => $attachmentPath,
                'file_name' => $fileInfo->getClientOriginalName(),
                'extension' => $fileInfo->getClientOriginalExtension(),
                'mime_type' => $fileInfo->getMimeType(),
                'size' => $fileInfo->getSize(),
            ]));
        }
    }
}
