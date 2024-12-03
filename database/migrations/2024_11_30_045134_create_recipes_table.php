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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('prepare_time');
            $table->string('difficulty');
            $table->integer('serving')->comment('For how many people can eat at a time');
            $table->string('main_image');
            $table->longText('long_description');
            $table->text('short_description');
            $table->foreignId('author_id')->constrained('authors')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('recipe_categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
