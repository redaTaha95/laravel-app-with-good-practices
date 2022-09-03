<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_new_product_without_categories () {
        $response = $this->call('POST', '/api/products', [
            "name" => "Name of Product",
            "description" => "Description of product",
            "price" => 12.5,
            "image" => "test.png"
        ]);

        $this->assertEquals($response->status(), 200);
    }

    /** @test */
    public function failed_to_create_a_new_product_without_categories () {
        $response = $this->call('POST', '/api/products', [
            "name" => "Name of Product",
            "description" => "Description of product",
            "image" => "test.png"
        ]);

        $this->assertEquals($response->status(), 400);
    }

    /** @test */
    public function create_a_new_product_with_categories () {
        $category = Category::factory()->create();

        $response = $this->call('POST', '/api/products', [
            "name" => "Name of Product",
            "description" => "Description of product",
            "price" => 12.5,
            "image" => "test.png",
            "categories" => [
                ["category_id" => $category->id]
            ]
        ]);

        $this->assertEquals($response->status(), 200);
    }

    /** @test */
    public function create_a_new_product_with_categories_that_not_exists () {
        $category = Category::factory()->create();

        $response = $this->call('POST', '/api/products', [
            "name" => "Name of Product",
            "description" => "Description of product",
            "price" => 12.5,
            "image" => "test.png",
            "categories" => [
                ["category_id" => 55]
            ]
        ]);

        $this->assertEquals($response->status(), 400);
    }
}
