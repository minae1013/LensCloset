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
        Schema::create('lenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('brand');
            $table->string('color');
            $table->decimal('lens_diameter', 3, 1);
            $table->decimal('colored_diameter', 3, 1);
            $table->string('lifespan');
            $table->integer('price');
            $table->string('image_path')->nullable();
            $table->string('rating');
            $table->text('comment');
            $table->string('repeat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lenses');
    }
};
