<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get('/url/current?name=Fahmi')
            ->assertSeeText('/url/current?name=Fahmi');
    }

    public function testNamed()
    {
        $this->get('/redirect/named')
            ->assertSeeText('/redirect/name/Fahmi');
    }

    public function testAction()
    {
        $this->get('/url/action')
            ->assertSeeText('/form');
    }

}
