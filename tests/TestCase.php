<?php

namespace LaravelFans\Confluence\Tests;

use Faker;
use LaravelFans\Confluence\ConfluenceServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected Faker\Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker\Factory::create();
    }

    protected function getEnvironmentSetUp($app)
    {
        $faker = Faker\Factory::create();
        // TODO useless because be mocked
        $app['config']->set('confluence.root_uri', $faker->url);
        $app['config']->set('confluence.auth', [$faker->userName, $faker->password]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            ConfluenceServiceProvider::class,
        ];
    }
}
