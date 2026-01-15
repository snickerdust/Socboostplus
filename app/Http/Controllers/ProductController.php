<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function facebook()
    {
        $products = $this->productService->getAllProducts();
        $facebookProducts = $products['facebook'] ?? [];
        
        // Structure expected by view: 
        // $facebookProducts['followers'] = [...], $facebookProducts['likes'] = [...]
        
        return view('products.facebook', [
            'products' => $facebookProducts
        ]);
    }

    public function instagram()
    {
        $products = $this->productService->getAllProducts();
        $instagramProducts = $products['instagram'] ?? [];

        return view('products.instagram', [
            'products' => $instagramProducts
        ]);
    }

    public function tiktok()
    {
        $products = $this->productService->getAllProducts();
        $tiktokProducts = $products['tiktok'] ?? [];

        return view('products.tiktok', [
            'products' => $tiktokProducts
        ]);
    }
}
