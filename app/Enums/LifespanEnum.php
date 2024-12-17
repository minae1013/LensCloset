<?php
namespace App\Enums;

enum LifespanEnum: int
{
    case ONE_DAY = 1;
    case TWO_WEEKS = 2;
    case ONE_MONTH = 3;

    public function label(): string
    {
        return match ($this) {
            LifespanEnum::ONE_DAY => '1day',
            LifespanEnum::TWO_WEEKS => '2week',
            LifespanEnum::ONE_MONTH => '1month',
        };
    }
}