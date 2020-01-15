<?php

namespace Yab\LaravelMint\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Yab\LaravelMint\Traits\SavesQuietly;
use Yab\LaravelMint\Tests\Events\EventfulModelSaved;

class EventfulModel extends Model
{
	use SavesQuietly;

	protected $dispatchesEvents = [
		'saved' => EventfulModelSaved::class,
	];

	public static function boot()
	{
		parent::boot();

		self::created(function($model) {
			$model->is_created_event = true;
		});
	}
}