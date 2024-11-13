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
        Schema::create('question_practices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('class_bimbel_id')->constrained()->cascadeOnDelete();
            $table->string('question')->nullable();
            $table->string('image')->nullable();
            $table->string('correct_answer');
            $table->longText('explanation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_practices');
    }
};
