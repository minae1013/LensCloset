<?php
namespace App\Enums;

enum RatingEnum: int
{
    case VERY_GOOD = 1;
    case GOOD = 2;
    case NEUTRAL = 3;
    case BAD = 4;
    case VERY_BAD = 5;

    public function label(): string
    {
        return match ($this) {
            RatingEnum::VERY_GOOD => '非常に良い',
            RatingEnum::GOOD => '良い',
            RatingEnum::NEUTRAL => 'どちらでもない',
            RatingEnum::BAD => '悪い',
            RatingEnum::VERY_BAD => '非常に悪い',
        };
    }
}