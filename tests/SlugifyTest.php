<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\SlugModel;

class SlugifyTest extends TestCase
{
    /** @test */
    public function a_newly_created_model_has_a_slug_automatically_computed()
    {
        $model = factory(SlugModel::class)->create([
            'name' => 'Slugify Me'
        ]);

        $this->assertDatabaseHas('slug_models', [
            'id' => $model->id,
            'name' => 'Slugify Me',
            'slug' => 'slugify-me',
        ]);
    }

    /** @test */
    public function duplicate_slugs_are_handled_gracefully()
    {
        $model = factory(SlugModel::class)->create([
            'name' => 'Sample Name'
        ]);

        $modelSameName = factory(SlugModel::class)->create([
            'name' => 'Sample Name'
        ]);

        $this->assertDatabaseHas('slug_models', [
            'id' => $model->id,
            'name' => 'Sample Name',
            'slug' => 'sample-name',
        ]);

        $this->assertDatabaseHas('slug_models', [
            'id' => $modelSameName->id,
            'name' => 'Sample Name',
        ]);

        $this->assertTrue(str_contains($modelSameName->slug, 'sample-name-'));
        $this->assertEquals(25, strlen($modelSameName->slug));
    }
}
