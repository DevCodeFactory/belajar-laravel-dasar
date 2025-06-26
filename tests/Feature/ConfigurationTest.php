<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.name.first');
        $lastName = config('contoh.name.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Azdy', $firstName);
        self::assertEquals('Fahmi', $lastName);
        self::assertEquals('azdy.fm@gmail.com', $email);
        self::assertEquals('https://www.azdyfahmi.com', $web);
    }

}
