<?php

namespace Yab\LaravelMint\Tests\Models;

use Yab\LaravelMint\Traits\Immutable;
use Illuminate\Database\Eloquent\Model;

class ImmutableModel extends Model
{
	use Immutable;
	
	protected $fillable = [
		'field',
	];
}