<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Exceptions;

use Symfony\Component\HttpFoundation\Response;

/**
 * Исключение, когда не удалось получить продукты.
 */
final class ProductNotFoundException extends ProductException
{
    /**
     * Текст сообщения.
     *
     * @var string
     */
    public $message = 'Ошибка в получении продуктов.';

    /**
     * Код статуса.
     *
     * @var int
     */
    public $code = Response::HTTP_INTERNAL_SERVER_ERROR;
}
