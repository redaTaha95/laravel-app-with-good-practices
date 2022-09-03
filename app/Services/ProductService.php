<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService implements Interfaces\ProductServiceInterface
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function listOfProducts()
    {
        return $this->productRepository->all();
    }

    public function createProduct(ProductRequest $productRequest)
    {
        $product = $this->productRepository->create($productRequest->only(['name', 'description', 'price', 'image']));

        if($this->checkIfProductRequestHasCategories($productRequest)) {
            $this->attachCategoriesToProduct($product, $productRequest['categories']);
        }

        return $product;
    }

    public function attachCategoriesToProduct(Product $product, array $categories)
    {
        $product->categories()->attach($categories);
    }

    public function checkIfProductRequestHasCategories(ProductRequest $productRequest)
    {
        return $productRequest->has('categories');
    }

    public function filterProductsByCategory(int $category_id)
    {
        if($this->categoryRepository->checkIfCategoryExists($category_id)) {
            $category = $this->categoryRepository->find($category_id);

            return response()->json([
                'success'   => false,
                'message'   => 'Products filtred by category ID: ' . $category_id,
                'products' => $category->products
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Category with id ' . $category_id . ' NOT FOUND'
            ]);
        }
    }
}
