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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            $table->string('hero_title');
            $table->text('hero_desc');
            $table->string('hero_image');

            $table->string('tryout')->nullable();
            $table->string('event')->nullable();
            $table->string('bimbel')->nullable();
            $table->string('discount')->nullable();

            $table->string('about_us_title');
            $table->text('about_us_desc');
            $table->string('about_us_image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
