<?php

namespace Yab\Mint\Tests;

use Ramsey\Uuid\Uuid;
use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\UuidModel;
use Yab\Mint\Tests\Models\UuidColumnModel;

class UuidTest extends TestCase
{
    /** @test */
    public function a_newly_created_uuid_model_has_a_uuid()
    {
        $model = factory(UuidModel::class)->create();

        $this->assertTrue(Uuid::isValid($model->id));

        $this->assertDatabaseHas('uuid_models', [
            'id' => $model->id,
        ]);
    }

    /** @test */
    public function the_uuid_of_a_model_can_not_be_altered()
    {
        $model = factory(UuidModel::class)->create();

        $this->assertTrue(Uuid::isValid($model->id));

        $originalId = $model->id;

        $model->id = 'something-else';
        $model->save();

        $this->assertDatabaseHas('uuid_models', [
            'id' => $originalId,
        ]);
    }

    /** @test */
    public function the_uuid_column_name_can_be_customized_on_the_model()
    {
        $model = factory(UuidColumnModel::class)->create();

        $this->assertTrue(Uuid::isValid($model->uuid));

        $this->assertDatabaseHas('uuid_column_models', [
            'uuid' => $model->uuid,
        ]);
    }
}
