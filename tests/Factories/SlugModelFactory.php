<?php

namespace Yab\Mint\Tests\Factories;

use Yab\Mint\Tests\Models\SlugModel;

$factory->define(SlugModel::class, function () {
    return [
        'name' => 'Sample Name'
    ];
});
