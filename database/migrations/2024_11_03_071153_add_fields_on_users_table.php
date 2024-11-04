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
        Schema::table('users', function (Blueprint $table) {
            //

            $table->after('password', function ($table){
                
                $table->string('phone')->nullable();
                $table->string('otp')->nullable();
                $table->string('avatar')->nullable();
                $table->string('access')->default('yes')->nullable();
                $table->enum('role',['admin','user','mentor'])->default('user');
                
                $table->unsignedBigInteger('data_universitas_id')->nullable();
                $table->foreign('data_universitas_id')->references('id')->on('data_universitas');

                $table->unsignedBigInteger('second_data_universitas_id')->nullable();
                $table->foreign('second_data_universitas_id')->references('id')->on('data_universitas');

            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->dropForeign(['university_id']);
            $table->dropForeign(['major_id']);
            $table->dropForeign(['second_university_id']);
            $table->dropForeign(['second_major_id']);
            $table->dropColumn('phone');
            $table->dropColumn('otp');
            $table->dropColumn('avatar');
            $table->dropColumn('access');
            $table->dropColumn('role');
            $table->dropColumn('university_id');
            $table->dropColumn('major_id');
            $table->dropColumn('second_university_id');
            $table->dropColumn('second_major_id');

        });
    }
};
