<?php

namespace App\Services\Api\Models\Products\Exceptions;

use Exception as BaseException;

/**
 * Базовое исключение продукта.
 */
class ProductException extends BaseException
{
    /**
     * Текст сообщения.
     *
     * @var string
     */
    public $message = 'Исключение продукта.';
}
