<?php
namespace App\Enums;

enum RepeatEnum: string
{
    case YES = '1';
    case NO = '2';

    public function label(): string
    {
        return match($this)
        {
            RepeatEnum::YES => 'あり',
            RepeatEnum::NO => 'なし',
        };
    }
}