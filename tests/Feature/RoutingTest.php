<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testBasicRouting()
    {
        $this->get('/dcs')
            ->assertStatus(200)
            ->assertSeeText('Hello DevCode Factory');
    }

    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/dcs');
    }

    public function testFallback()
    {
        $this->get('/tidakada')
            ->assertSeeText('404 By DevCode Factory');

        $this->get('/tidakadalagi')
            ->assertSeeText('404 By DevCode Factory');

        $this->get('/ups')
            ->assertSeeText('404 By DevCode Factory');
    }

}
