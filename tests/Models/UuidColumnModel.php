<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Traits\UuidModel as UuidModelTrait;

class UuidColumnModel extends Model
{
    use UuidModelTrait;

    /**
     * Set the UUID column name for the model.
     *
     * @return string
     */
    public static function getUuidColumnName(): string
    {
        return 'uuid';
    }
}
