<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Dto;

use Illuminate\Support\Arr;

/**
 * Данные для получения продуктов.
 */
class ProductFilterDto
{
    public ?int $page;
    public ?int $paginate;
    public array $properties;

    /**
     * Конструктор.
     */
    public function __construct(array $data)
    {
        $this->properties = $data['properties'] ?? [];
        $this->page = Arr::get($data, 'page');
        $this->paginate = Arr::get($data, 'paginate');
    }

    /**
     * Представление в виде массива.
     */
    public function toArray(): array
    {
        return [
            'properties' => $this->properties,
            'page' => $this->page,
            'paginate' => $this->paginate,
        ];
    }
}
