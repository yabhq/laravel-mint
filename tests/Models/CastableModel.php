<?php

namespace Yab\LaravelMint\Tests\Models;

use Yab\LaravelMint\Casts\Money;
use Illuminate\Database\Eloquent\Model;

class CastableModel extends Model
{
    protected $fillable = [
        'amount',
    ];

    protected $casts = [
        'amount' => Money::class,
    ];
}
