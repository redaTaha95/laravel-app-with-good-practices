<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\ProductController;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productName = $this->ask("Product name");
        $productDescription = $this->ask("Product description");
        $productPrice = $this->ask("Product price");
        $productImageUrl = $this->ask("Product image url");

        $productRequest = app(Request::class);
        $productRequest->replace([
            "name" => $productName,
            "description" => $productDescription,
            "price" => $productPrice,
            "image" => $productImageUrl
        ]);
        $productRequest->setMethod('POST');

        $productController = app(ProductController::class);
        $response = $productController->store(app(ProductRequest::class));
        $this->info($response);
        return 0;
    }
}
