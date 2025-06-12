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
        Schema::create('settings', function (Blueprint $table) {
            $table->string('site_name');
            $table->text('site_desc');
            $table->string('site_phone');
            $table->string('site_address');
            $table->string('site_email');
            $table->string('email_support',500);
            $table->string('facebook_url',500);
            $table->string('twitter_url',500);
            $table->string('youtube_url',500);
            $table->string('meta_description' , 160)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            $table->string('site_copyright')->nullable();

            $table->string('promotion_video_url',1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
