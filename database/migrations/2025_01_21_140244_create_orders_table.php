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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->decimal('price',8,2);
            $table->decimal('shopping_price',8,2);
            $table->decimal('total_price',8,2);
$table->text('note');
$table->enum('status',['panding','complete','deliverd','cancelld'])->default('panding');
$table->string('country');
$table->string('city');
$table->string('street');
$table->string('governorate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
