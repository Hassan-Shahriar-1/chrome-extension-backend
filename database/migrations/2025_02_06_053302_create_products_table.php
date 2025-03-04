<?php

use App\Enums\CurrencyEnum;
use App\Enums\FacebookMarketplaceCategory;
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
            $table->string('name');
            $table->text('desciption');
            $table->double('price');
            $table->enum('currency', array_column(CurrencyEnum::cases(), 'value'))->default(CurrencyEnum::EUR);
            $table->string('image')->nullable();
            $table->enum('category', array_column(FacebookMarketplaceCategory::cases(), 'value'));
            $table->string('location')->default('french');
            $table->timestamps();
            $table->softDeletes();
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
