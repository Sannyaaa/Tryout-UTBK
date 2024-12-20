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
        Schema::create('answer_question_practices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('question_practice_id')->constrained();
            $table->enum('answer', ['a', 'b', 'c', 'd', 'e']);
            $table->foreignId('user_id');
            $table->foreignId('result_practice_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_question_practices');
    }
};
