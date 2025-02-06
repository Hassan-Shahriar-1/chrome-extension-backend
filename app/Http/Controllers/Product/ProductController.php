<?php

namespace App\Http\Controllers\Product;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductDetailsResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * All Products
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function allProducts(Request $request): JsonResponse
    {
        $allProducts = Product::all();
        return ApiResponseHelper::successResponse(ProductDetailsResource::collection($allProducts));
    }
}
