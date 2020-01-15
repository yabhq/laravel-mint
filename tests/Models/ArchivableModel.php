<?php

namespace Yab\LaravelMint\Tests\Models;

use Yab\LaravelMint\Traits\Archivable;
use Illuminate\Database\Eloquent\Model;

class ArchivableModel extends Model
{
	use Archivable;
}