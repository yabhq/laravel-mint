<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\ArchivableModel;

class ArchivableTest extends TestCase
{
	/** @test */
    public function a_model_can_be_archived()
    {
    	$model = factory(ArchivableModel::class)->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => null
        ]);

        $this->assertEquals(null, $model->archived_at);

        $model->archive();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(now()->toDateTimeString(), $model->archived_at);
    }

	/** @test */
    public function archived_models_are_excluded_via_global_scope()
    {
    	$archived = factory(ArchivableModel::class)->state('archived')->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $archived->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(0, ArchivableModel::count());
    }

	/** @test */
    public function archived_models_can_be_retrieved_via_the_with_archived_scope()
    {
    	$archived = factory(ArchivableModel::class)->state('archived')->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $archived->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(1, ArchivableModel::withArchived()->count());
    }

    /** @test */
    public function a_model_can_be_unarchived()
    {
    	$model = factory(ArchivableModel::class)->state('archived')->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(now()->toDateTimeString(), $model->archived_at);

        $model->unarchive();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => null
        ]);

        $this->assertEquals(null, $model->archived_at);
    }
}