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
        Schema::table('home_pages', function (Blueprint $table) {
            //

            $table->string('feature_title')->after('hero_image');
            $table->text('feature_desc')->after('feature_title')->nullable();

            $table->string('package_title')->after('about_us_image');
            $table->text('package_desc')->after('package_title')->nullable();

            $table->string('mentor_title')->after('package_desc');
            $table->text('mentor_desc')->after('mentor_title')->nullable();

            $table->string('testimonial_title')->after('mentor_desc');
            $table->text('testimonial_desc')->after('testimonial_title')->nullable();

            $table->string('faq_title')->after('testimonial_desc');
            $table->text('faq_desc')->after('faq_title')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            //
        });
    }
};
