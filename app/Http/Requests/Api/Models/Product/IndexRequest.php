<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Models\Product;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Проверка входящий данных для продуктов.
 */
class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации полей.
     */
    public function rules(): array
    {
        return [
            'properties' => 'array',
            'page' => 'int',
            'paginate' => 'int',
        ];
    }
}
