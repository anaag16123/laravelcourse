<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageSaveRequest;
use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageController extends Controller
{
    private ImageStorage $imageStorage;

    public function __construct(ImageStorage $imageStorage)
    {
        $this->imageStorage = $imageStorage;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Image Storage - DI';

        return view('image.index')->with('viewData', $viewData);
    }

    public function save(ImageSaveRequest $request): RedirectResponse
    {
        $this->imageStorage->store($request->validated('profile_image'));

        return back();
    }
}
