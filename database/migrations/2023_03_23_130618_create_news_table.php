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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('highlights_id')->index();
            $table->foreign('highlights_id')->references('id')->on('highlights')->cascadeOnDelete();
            $table->string('name_tm');
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->string('video')->nullable();
            $table->string('viewed')->default(0);
            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
