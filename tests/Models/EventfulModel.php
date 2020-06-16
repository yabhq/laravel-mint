<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Traits\SavesQuietly;
use Yab\Mint\Tests\Events\EventfulModelSaved;

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