<?php

namespace Yab\Mint\Tests\Models;

use Yab\Mint\Casts\Money;
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
