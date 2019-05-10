<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    public function testBasicTest(): void
    {
        $response = $this->get('/');
        $response->assertSee('laravel');
        $response->assertStatus(200);
    }

}
