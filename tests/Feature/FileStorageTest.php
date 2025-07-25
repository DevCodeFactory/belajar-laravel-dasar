<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
        $filesystem = Storage::disk('local');

        $filesystem->put('file.txt', 'Azdy Fahmi Hasyim');

        $content = $filesystem->get('file.txt');

        self::assertEquals('Azdy Fahmi Hasyim', $content);
    }

    public function testPublic()
    {
        $filesystem = Storage::disk('public');

        $filesystem->put('file.txt', 'Azdy Fahmi Hasyim');

        $content = $filesystem->get('file.txt');

        self::assertEquals('Azdy Fahmi Hasyim', $content);
    }


}
