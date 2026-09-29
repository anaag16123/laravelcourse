<?php

namespace App\Data;

class CartData
{
    private const PRODUCTS = [
        121 => ['name' => 'Tv samsung', 'price' => '1000'],
        11 => ['name' => 'Iphone', 'price' => '2000'],
    ];

    public static function getProducts(): array
    {
        return self::PRODUCTS;
    }
}
