<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\ArchivableModel;
use Yab\Mint\Tests\Models\HasAvatarModel;

class HasAvatarTest extends TestCase
{
    /** @test */
    public function use_gravatar_if_no_avatar_exists()
    {
        $model = new HasAvatarModel();
        $this->assertStringContainsString('gravatar.com', $model->avatar);
    }

    /** @test */
    public function model_can_have_a_avatar_path()
    {
        $model = new HasAvatarModel();
        $model->avatar_path = 'somepath.jpg';
        $this->assertStringContainsString('somepath.jpg', $model->avatar);
    }
}
