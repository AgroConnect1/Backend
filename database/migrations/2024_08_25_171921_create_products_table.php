<?php

use App\Models\category;
use App\Models\Farmer;
use App\Models\Producers;
use App\Models\Provider;
use App\Models\Providers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Farmer::class); //provider_id
            $table->foreignIdFor(Category::class); //category_id
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->string('type');
            $table->string('description');
            $table->string('stock_quantity');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
