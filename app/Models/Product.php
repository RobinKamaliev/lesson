<?php

declare(strict_types=1);

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Модель данных для продуктов.
 *
 * @property integer $id
 * @property string $name
 * @property float $price
 * @property integer $amount
 */
class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'price',
        'amount',
    ];

    /**
     * Применить фильтр к запросу.
     */
    public function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }

    /**
     * Получить характеристики продукта.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }
}
