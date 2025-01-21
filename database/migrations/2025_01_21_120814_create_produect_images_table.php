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
        Schema::create('produect_images', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_size')->nullable();
            $table->string('file_type')->nullable();
            $table->foreignId('prodect_id')->constrained('broducts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produect_images');
    }
};
