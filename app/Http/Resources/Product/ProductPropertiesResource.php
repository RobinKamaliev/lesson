<?php

declare(strict_types=1);

namespace App\Http\Resources\Product;

use App\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ресурс для представления данных характеристик продукта.
 *
 * @mixin ProductProperty
 */
class ProductPropertiesResource extends JsonResource
{
    /**
     * Преобразовать ресурс в массив.
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->value,
        ];
    }
}
