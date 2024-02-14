<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Repositories;

use Illuminate\Contracts\Pagination\Paginator;

/**
 * Интерфейс репозитория продуктов.
 */
interface ProductRepositoryInterface
{
    /**
     * Получить продукты.
     */
    public function getProducts(array $data): Paginator;
}
