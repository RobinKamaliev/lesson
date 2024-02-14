<?php

declare(strict_types=1);

namespace App\Services\Api\Models\Products\Providers;

use App\Services\Api\Models\Products\Repositories\EloquentProductRepository;
use App\Services\Api\Models\Products\Repositories\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Сервис-провайдер сервиса продуктов.
 */
final class ProductServiceProvider extends ServiceProvider
{
    /**
     * Регистрация сервисов.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
    }
}
