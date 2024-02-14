<?php

namespace Feature\App\Services\Api\Models\Products;

use App\Models\Product;
use App\Services\Api\Models\Products\Exceptions\ProductNotFoundException;
use App\Services\Api\Models\Products\ProductService;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    public ProductService $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = app(ProductService::class);
    }

    /**
     * Тест на получения продуктов.
     * Проверка 'id' продукта с 'id' полученного продукта.
     * Проверка 'name' продукта с 'name' полученного продукта.
     * Проверка 'price' продукта с 'price' полученного продукта.
     * Проверка 'amount' продукта с 'amount' полученного продукта.
     *
     * @throws ProductNotFoundException
     */
    public function test_get_products_success(): void
    {
        $product = Product::factory()->create();

        $res = $this->service->getProducts([]);

        $this->assertEquals($product->id, $res[0]->id);
        $this->assertEquals($product->name, $res[0]->name);
        $this->assertEquals($product->price, $res[0]->price);
        $this->assertEquals($product->amount, $res[0]->amount);
    }


    //todo: проверка хорошего и плохого сценария, проверка все сервисов, dto, http, repositories..
}
