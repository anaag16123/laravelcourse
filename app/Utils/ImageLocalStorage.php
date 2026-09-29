<?php

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(UploadedFile $image): void
    {
        Storage::disk('public')->put(
            'test.png',
            file_get_contents($image->getRealPath())
        );
    }
}
