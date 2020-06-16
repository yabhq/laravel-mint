<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\EventfulModel;

class FactoryWithoutEventsTest extends TestCase
{
	/** @test */
    public function factory_events_are_enabled_by_default()
    {
		$model = factory(EventfulModel::class)->create();

		$this->assertTrue($model->is_created_event);
    }

	/** @test */
    public function factory_events_can_be_disabled_on_demand()
    {
		$model = factory(EventfulModel::class)->withoutEvents()->create();

		$this->assertEquals(null, $model->is_created_event);
    }
}