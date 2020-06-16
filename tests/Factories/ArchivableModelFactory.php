<?php

use Yab\Mint\Tests\Models\ArchivableModel;

$factory->define(ArchivableModel::class, function () {
    return [
        'archived_at' => null,
    ];
});

$factory->state(ArchivableModel::class, 'archived', function() {
    return [
        'archived_at' => now()->toDateTimeString(),
    ];
});