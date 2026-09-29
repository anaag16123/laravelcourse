<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'profile_image' => [
                'required',
                'image',
            ],
        ];
    }
}
