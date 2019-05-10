<?php

namespace Tests\Feature\Admin;

use Illuminate\Support\Facades\Lang;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPageTest extends TestCase
{

    /** @test */
    public function admin_route_dashboard(): void
    {
        $response = $this->get('admin');
        $response->assertSee(Lang::get('admin.dashboard'));
    }

    /** @test */
    public function languages_route_index(): void
    {
        $response = $this->get('admin/languages');
        $response->assertSee(Lang::get('admin.listing_languages'));
    }

    /** @test */
    public function languages_route_create(): void
    {
        $response = $this->get('admin/languages/create');
        $response->assertSee(Lang::get('admin.add_languages'));
    }

    /** @test */
    public function languages_route_edit(): void
    {
        $response = $this->get('admin/languages/1/edit');
        $response->assertSee(Lang::get('admin.edit_language'));
    }

    /** @test */
    public function content_route_index(): void
    {
        $response = $this->get('admin/contents');
        $response->assertSee(Lang::get('admin.content'));
    }

    /** @test */
    public function content_route_create(): void
    {
        $response = $this->get('admin/contents/create');
        $response->assertSee(Lang::get('admin.add_content'));
    }

    /** @test */
    public function content_route_edit(): void
    {
        $response = $this->get('admin/contents/1/edit');
        $response->assertSee(Lang::get('admin.edit_content'));
    }
}
