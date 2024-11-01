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
        Schema::create('package_members', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('price');

            $table->unsignedBigInteger('tryout_id')->nullable();
            $table->foreign('tryout_id')->references('id')->on('tryouts')->onDelete('cascade');
            $table->unsignedBigInteger('bimbel_id')->nullable();
            $table->foreign('bimbel_id')->references('id')->on('bimbels')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_members');
    }
};
