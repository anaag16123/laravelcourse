<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
          ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>2500000],
          ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>3500000],
          ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>350000],
          ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>700000]
];
    
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

   public function show(string $id): View | \Illuminate\Http\RedirectResponse
{
    if ($id <= 0 || $id > count(ProductController::$products)) {
        return redirect()->route('home.index');
    }

    $viewData = [];
    $product = ProductController::$products[$id-1];
    $viewData["title"] = $product["name"]." - Online Store";
    $viewData["subtitle"] =  $product["name"]." - Product information";
    $viewData["product"] = $product;
    return view('product.show')->with("viewData", $viewData);
}

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request): View
    {
    $request->validate([
        "name" => "required",
        "price" => "required|numeric|gt:0"
    ]);
    return view('product.create_success');
    }
}


