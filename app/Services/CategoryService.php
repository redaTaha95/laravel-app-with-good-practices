<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements Interfaces\CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listOfCategories()
    {
        return $this->categoryRepository->all();
    }
}
