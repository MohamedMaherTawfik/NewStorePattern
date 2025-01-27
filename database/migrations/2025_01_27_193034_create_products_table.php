<?php

use App\Models\brands;
use App\Models\categories;
use App\Models\marketplace;
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
            $table->string('description')->nullable();
            $table->string('image');
            $table->double('price');
            $table->integer('quantity');
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->foreignIdFor(categories::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(brands::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(marketplace::class)->constrained()->onDelete('cascade');
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
