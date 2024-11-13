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
        Schema::table('answer_questions', function (Blueprint $table) {
            $table->foreignId('result_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer_questions', function (Blueprint $table) {
            //

            // To undo the foreign key constraint, we need to drop the foreign key constraint
            // and then re-add it with the same options.
            $table->dropForeign(['result_id']);
            $table->foreignId('result_id')->constrained()->onDelete('cascade');
        });
    }
};
