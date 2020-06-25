<?php

namespace Yab\Mint\Tests\Models;

use Yab\Mint\Traits\Slugify;
use Illuminate\Database\Eloquent\Model;

class SlugModel extends Model
{
    use Slugify;

    protected $fillable = [
        'name',
    ];
}
