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
        Schema::create('component_pages', function (Blueprint $table) {
            $table->id();

            $table->string('navbar_image');
            $table->string('footer_image');
            $table->text('short_desc')->nullable();

            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();
            $table->string('tiktok')->nullable();

            $table->string('copyright');

            $table->string('email');
            $table->string('phone');
            $table->text('address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_pages');
    }
};
