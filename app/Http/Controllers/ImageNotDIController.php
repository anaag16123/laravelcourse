<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageSaveRequest;
use App\Utils\ImageLocalStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageNotDIController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Image Storage - Not DI';

        return view('imagenotdi.index')->with('viewData', $viewData);
    }

    public function save(ImageSaveRequest $request): RedirectResponse
    {
        $imageLocalStorage = new ImageLocalStorage;
        $imageLocalStorage->store($request->validated('profile_image'));

        return back();
    }
}
