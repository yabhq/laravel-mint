<?php

namespace Yab\Mint\Tests\Models;

use Yab\Mint\Traits\Immutable;
use Illuminate\Database\Eloquent\Model;

class ImmutableModel extends Model
{
	use Immutable;
	
	protected $fillable = [
		'field',
	];
}