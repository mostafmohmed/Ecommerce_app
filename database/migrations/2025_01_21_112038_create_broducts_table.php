<?php

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
        Schema::create('broducts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('small_desc');
            $table->longText('desc');
            $table->date('avilable_for')->nullable();
            $table->decimal('discount');
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();
$table->boolean('manage_stock')->default(0);
$table->integer('quantity');
$table->integer('avilable_to_stock')->default(1);
$table->integer('views');
$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
$table->foreignId('brand_id')->constrained('brandes')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broducts');
    }
};
