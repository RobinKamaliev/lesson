<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Repositories;

use App\Filters\ProductFilter;
use App\Models\Product;
use App\Services\Api\Models\Products\Dto\ProductFilterDto;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * Eloquent-репозиторий продуктов.
 */
final class EloquentProductRepository implements ProductRepositoryInterface
{
    /**
     * Получить продукты.
     */
    public function getProducts(ProductFilterDto $productFilterDto): Paginator
    {
        /** @var ProductFilter $productFilter */
        $productFilter = app(ProductFilter::class, ['data' => $productFilterDto->toArray()]);

        return Product::filter($productFilter)
            ->with('properties')
            ->paginate($productFilter->getPaginate(), ['*'], 'page', $productFilter->getPage());
    }
}
