<?php

namespace Yab\LaravelMint\Traits;

trait SavesQuietly
{
    /**
     * Save the model quietly without dispatching any events.
     * 
     * @param  array  $options
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->save($options);
        });
    }
}