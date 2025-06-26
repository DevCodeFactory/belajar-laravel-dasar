<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Fahmi')
            ->assertSeeText('Hello Fahmi');

        $this->post('/input/hello', [
            'name' => 'Fahmi'
        ])->assertSeeText('Hello Fahmi');
    }

    public function testNestedInput()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Fahmi',
                'last' => 'Hasyim'
            ]
        ])->assertSeeText('Hello Fahmi');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'Fahmi',
                'last' => 'Hasyim'
            ]
        ])->assertSeeText('name')
        ->assertSeeText('first')->assertSeeText('Fahmi')
        ->assertSeeText('last')->assertSeeText('Hasyim');
    }

    public function testArrayInput()
    {
        $this->post('/input/hello/array', [
            'products' => [
                [
                    'name' => 'Apple Macbook Pro',
                    'price' => 30_000_000
                ],
                [
                    'name' => 'Samsung Galaxy S10',
                    'price' => 15_000_000
                ]
            ]
        ])->assertSeeText('Apple Macbook Pro')
            ->assertSeeText('Samsung Galaxy S10');
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Azdy',
            'married' => 'true',
            'birthdate' => '1991-12-05'
        ])->assertSeeText('Azdy')->assertSeeText('true')->assertSeeText('1991-12-05');
    }

}
