<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function checkIfCategoryExists(int $category_id);
}
