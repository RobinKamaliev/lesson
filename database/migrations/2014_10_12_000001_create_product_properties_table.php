<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->index(['name', 'value']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_properties');
    }
};
