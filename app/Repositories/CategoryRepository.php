<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements Interfaces\CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function checkIfCategoryExists(int $category_id)
    {
        return Category::where("id", $category_id)->exists();
    }
}
