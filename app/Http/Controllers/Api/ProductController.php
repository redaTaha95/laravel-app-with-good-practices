<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Interfaces\ProductServiceInterface;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->listOfProducts();
        return response()->json($products);
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $productRequest)
    {
        $product = $this->productService->createProduct($productRequest);
        return response()->json($product);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(ProductRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function filterProductsByCategory(int $category_id) {
        return $this->productService->filterProductsByCategory($category_id);
    }
}
