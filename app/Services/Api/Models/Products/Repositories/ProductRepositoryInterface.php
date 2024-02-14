<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Repositories;

use App\Services\Api\Models\Products\Dto\ProductFilterDto;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * Интерфейс репозитория продуктов.
 */
interface ProductRepositoryInterface
{
    /**
     * Получить продукты.
     */
    public function getProducts(ProductFilterDto $productFilterDto): Paginator;
}
