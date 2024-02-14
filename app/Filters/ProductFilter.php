<?php

declare(strict_types=1);

namespace App\Filters;

use App\Models\ProductProperty;
use Illuminate\Database\Eloquent\Builder;

/**
 * Фильтр продуктов.
 */
final class ProductFilter extends QueryFilter
{
    /**
     * Дефолтное значение пагинации продуктов.
     *
     * @var int
     */
    const PAGINATE = 40;

    /**
     * Дефолтное значение страницы продуктов.
     *
     * @var int
     */
    const PAGE = 1;


    /**
     * Конструктор.
     */
    public function __construct(array $data)
    {
        $this->arr = $data;
    }

    /**
     * Builder фильтрации продуктов.
     */
    protected function properties($allQueryParam): Builder
    {
        $query = ProductProperty::query();
        foreach ($allQueryParam as $i => $v) {
            $query->orWhere('name', $i)->whereIn('value', $v);
        }

        return $this->builder->whereIn('id', $query->get()->pluck('product_id'));
    }

    /**
     * Получить дефолтное значение пагинации продуктов.
     * Дефолтное значение страницы продуктов.
     */
    public function getPaginate(): int
    {
        return intval($this->arr['paginate'] ?? self::PAGINATE);
    }

    /**
     * Получить дефолтное значение страницы продуктов.
     */
    public function getPage(): int
    {
        return intval($this->arr['page'] ?? self::PAGE);
    }
}
