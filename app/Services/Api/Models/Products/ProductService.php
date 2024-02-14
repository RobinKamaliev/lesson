<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products;

use App\Services\Api\Models\Products\Exceptions\ProductNotFoundException;
use App\Services\Api\Models\Products\Repositories\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Сервис для логики получения продуктов.
 */
class ProductService
{
    /**
     * Инициализация.
     */
    public function __construct(readonly ProductRepositoryInterface $repository)
    {
    }

    /**
     *  Получить продукты.
     *
     * @throws ProductNotFoundException
     */
    public function getProducts(array $data): Paginator
    {
        try {
            return $this->repository->getProducts($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            throw new ProductNotFoundException();
        }
    }
}
