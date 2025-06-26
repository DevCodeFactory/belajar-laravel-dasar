<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello Fahmi');

        $this->get('/hello-again')
            ->assertSeeText('Hello Fahmi');
    }

    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('World Fahmi');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Fahmi'])
            ->assertSeeText('Hello Fahmi');

        $this->view('hello.world', ['name' => 'Fahmi'])
            ->assertSeeText('World Fahmi');
    }
}
