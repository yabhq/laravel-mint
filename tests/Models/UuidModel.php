<?php

namespace Yab\Mint\Tests\Models;

use Yab\Mint\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class UuidModel extends Model
{
    use Uuid;
}
