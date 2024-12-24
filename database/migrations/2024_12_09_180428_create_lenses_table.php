<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\RepeatEnum;
use App\Enums\LifespanEnum;
use App\Enums\RatingEnum;

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
            $table->enum('lifespan', [LifespanEnum::ONE_DAY->value, LifespanEnum::TWO_WEEKS->value, LifespanEnum::ONE_MONTH->value])->default(LifespanEnum::ONE_DAY->value);
            $table->integer('price');
            $table->string('image_path')->nullable();
            $table->enum('rating', [RatingEnum::VERY_GOOD->value, RatingEnum::GOOD->value, RatingEnum::NEUTRAL->value, RatingEnum::BAD->value, RatingEnum::VERY_BAD->value])->default(RatingEnum::NEUTRAL->value);
            $table->text('comment');
            $table->enum('repeat', [RepeatEnum::YES->value, RepeatEnum::NO->value])->default(RepeatEnum::NO->value);
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
