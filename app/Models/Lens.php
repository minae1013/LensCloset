<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\RepeatEnum;
use App\Enums\LifespanEnum;

class Lens extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'brand',
        'color',
        'lens_diameter',
        'colored_diameter',
        'lifespan',
        'price',
        'image_path',
        'rating',
        'comment',
        'repeat',
    ];

    protected $casts = [
        'lifespan' => LifespanEnum::class,
        'repeat' => RepeatEnum::class,
    ];
}
