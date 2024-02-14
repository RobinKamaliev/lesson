<?php

declare(strict_types=1);

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ресурс для представления данных характеристик продукта.
 *
 * @mixin Product
 */
class IndexProductResource extends JsonResource
{
    /**
     * Преобразовать ресурс в массив.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'amount' => $this->amount,
            'properties' => ProductPropertiesResource::collection($this->whenLoaded('properties')),
        ];
    }
}
