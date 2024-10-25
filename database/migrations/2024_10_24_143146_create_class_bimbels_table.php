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
        Schema::create('class_bimbels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bimbel_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_categories_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->string('name')->nullable();
            $table->time('start_time')->nullable();
            $table->date('date')->nullable();

            $table->string('link_zoom')->nullable();
            $table->string('link_video')->nullable();
            $table->string('materi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_bimbels');
    }
};
