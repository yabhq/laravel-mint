<?php

namespace Yab\Mint\Tests\Models;

use Yab\Mint\Traits\Archivable;
use Illuminate\Database\Eloquent\Model;

class ArchivableModel extends Model
{
	use Archivable;
}