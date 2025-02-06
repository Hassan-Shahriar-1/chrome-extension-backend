<?php

namespace App\Http\Controllers\Product;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductDetailsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts(Request $request)
    {
        $allProducts = Product::all();

        return ApiResponseHelper::successResponse(ProductDetailsResource::collection($allProducts));
    }
}
