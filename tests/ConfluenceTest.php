<?php

namespace LaravelFans\Confluence\Tests;

use Confluence\Content;
use LaravelFans\Confluence\Facades\Confluence;
use Mockery\MockInterface;

class ConfluenceTest extends TestCase
{
    protected int $id;
    protected array $params;

    protected function setUp(): void
    {
        parent::setUp();
        $this->id = $this->faker->randomNumber();
        $this->params = [
            "{$this->faker->word}" => "{$this->faker->word}",
            "{$this->faker->word}" => "{$this->faker->word}",
        ];
    }

    public function testDestroy()
    {
        $id = $this->id;
        $mock = $this->partialMock(Content::class, function (MockInterface $mock) use ($id) {
            $mock->shouldReceive('destroy')->withArgs([$id, []])->once();
        });
        Confluence::setResource($mock);
        Confluence::resource(Content::class)->destroy($id);
    }

    public function testIndex()
    {
        $mock = $this->partialMock(Content::class, function (MockInterface $mock) {
            $mock->shouldReceive('index')->once();
        });
        Confluence::setResource($mock);
        Confluence::resource(Content::class)->index();
    }

    public function testShow()
    {
        $id = $this->id;
        $mock = $this->partialMock(Content::class, function (MockInterface $mock) use ($id) {
            $mock->shouldReceive('show')->withArgs([$id, []])->once();
        });
        Confluence::setResource($mock);
        Confluence::resource(Content::class)->show($id);
    }

    public function testStore()
    {
        $params = $this->params;
        $mock = $this->partialMock(Content::class, function (MockInterface $mock) use ($params) {
            $mock->shouldReceive('store')->withArgs([$params])->once();
        });
        Confluence::setResource($mock);
        Confluence::resource(Content::class)->store($params);
    }

    public function testUpdate()
    {
        $id = $this->id;
        $params = $this->params;
        $mock = $this->partialMock(Content::class, function (MockInterface $mock) use ($id, $params) {
            $mock->shouldReceive('update')->withArgs([$id, $params])->once();
        });
        Confluence::setResource($mock);
        Confluence::resource(Content::class)->update($id, $params);
    }
}
