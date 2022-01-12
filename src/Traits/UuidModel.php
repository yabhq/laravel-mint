<?php

namespace Yab\Mint\Traits;

use Ramsey\Uuid\Uuid as RamseyUuid;

trait UuidModel
{
    /**
     * Hook into the boot method to catch creating and saving events
     *
     * @return void
     */
    public static function bootUuidModel()
    {
        static::creating(function ($model) {
            $model->{self::getUuidColumnName()} = RamseyUuid::uuid4()->toString();
        });

        static::saving(function ($model) {
            if ($model->{self::getUuidColumnName()} !== $model->getOriginal(self::getUuidColumnName())) {
                $model->{self::getUuidColumnName()} = $model->getOriginal(self::getUuidColumnName());
            }
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     */
    public function getKeyName()
    {
        return 'id';
    }

    /**
     * Set the UUID column name for the model.
     *
     * @return string
     */
    public static function getUuidColumnName(): string
    {
        return 'id';
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}
