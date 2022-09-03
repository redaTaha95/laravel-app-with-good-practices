<?php

namespace App\Services\Interfaces;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductServiceInterface
{
    public function listOfProducts();

    public function createProduct(ProductRequest $productRequest);

    public function attachCategoriesToProduct(Product $product, array $categories);

    public function checkIfProductRequestHasCategories(ProductRequest $productRequest);

    public function filterProductsByCategory(int $category_id);
}
