<?php

namespace Yab\LaravelMint\Tests;

use Yab\LaravelMint\Tests\TestCase;
use Yab\LaravelMint\Tests\Models\ImmutableModel;
use Yab\LaravelMint\Exceptions\ImmutableDataException;

class ImmutableTest extends TestCase
{
	/** @test */
    public function an_immutable_model_can_be_created()
    {
    	$model = ImmutableModel::create();

		$this->assertDatabaseHas('immutable_models', [
			'id' => $model->id
		]);
    }

	/** @test */
    public function an_immutable_model_cannot_be_updated()
    {
    	$model = ImmutableModel::create();

		$this->expectException(ImmutableDataException::class);

		$model->update([
			'field' => 'Updated value'
		]);
    }

	/** @test */
    public function an_immutable_model_cannot_be_deleted()
    {
    	$model = ImmutableModel::create();

		$this->expectException(ImmutableDataException::class);

		$model->delete();
    }
}