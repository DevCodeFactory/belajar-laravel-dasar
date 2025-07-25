<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config('contoh.name.first');
        $firstName2 = Config::get('contoh.name.first');

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $config = $this->app->make('config');
        $firstName3 = $config->get('contoh.name.first');

        $firstName1 = config('contoh.name.first');
        $firstName2 = Config::get('contoh.name.first');

        assertEquals($firstName1, $firstName3);
        assertEquals($firstName2, $firstName3);

        var_dump($config->all());
    }

    public function testFacadeMock()
    {
        Config::shouldReceive('get')
            ->with('contoh.name.first')
            ->andReturn('Fahmi Keren');

        $firstName = Config::get('contoh.name.first');

        self::assertEquals('Fahmi Keren', $firstName);
    }
}
