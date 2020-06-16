<?php

namespace Yab\Mint\Tests;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Schema::create('eventful_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('archivable_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });

        Schema::create('immutable_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field')->nullable();
            $table->timestamps();
        });

        Schema::create('castable_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->timestamps();
        });

        $this->withFactories(__DIR__ . '/Factories');
    }

    /**
     * Load our custom service provider for test purposes.
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ 'Yab\Mint\MintServiceProvider' ];
    }
}
