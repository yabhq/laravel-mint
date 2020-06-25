<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Traits\UuidModel as UuidModelTrait;

class UuidModel extends Model
{
    use UuidModelTrait;
}
