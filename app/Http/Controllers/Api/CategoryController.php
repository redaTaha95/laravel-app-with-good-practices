<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->listOfCategories();
        return response()->json($categories);
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $categoryRequest)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(CategoryRequest $categoryRequest, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
