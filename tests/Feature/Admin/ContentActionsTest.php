<?php

namespace Tests\Feature\Admin;

use App\Models\Content;
use App\Traits\Methods\CastToJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContentActionsTest extends TestCase
{
    use DatabaseTransactions, CastToJson;

    /** @test
     * @throws \Exception
     */
    public function add_content() : void
    {
        $content = factory(Content::class)->make();
        $response = $this->post('admin/contents',[
            'title' => $content->title,
            'text:en' => 'Create_Ok_en',
            'text:ru' => 'Create_Ok_ru'
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/contents')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('contents', [
            'id' => Content::whereTitle($content->title)->first()->id,
            'content' => $this->castToJson('{"text": {"de": null, "en": "Create_Ok_en", "es": null, "ru": "Create_Ok_ru", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function error_add_content(): void
    {
        factory(Content::class)->make();
        $response = $this->post('admin/contents',[
            'title' => null,
            'text:en' => '',
            'text:ru' => ''
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'title'
            ]);

        $this->assertDatabaseMissing('contents', [
            'title' => null,
            'content' => $this->castToJson('{"text": {"de": null, "en": "", "es": null, "ru": "", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function edit_content(): void
    {
        $content = factory(Content::class)->make();
        $response = $this->post('admin/contents',[
            'title' => $content->title,
            'text:en' => 'Create_Ok_en',
            'text:ru' => 'Create_Ok_ru'
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/contents')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('contents', [
            'id' => Content::whereTitle($content->title)->first()->id,
            'title' => $content->title,
            'content' => $this->castToJson('{"text": {"de": null, "en": "Create_Ok_en", "es": null, "ru": "Create_Ok_ru", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')
        ]);

        $data = [
            'title' => $content->title,
            'text:en' => 'Create_Ok_en',
            'text:ru' => 'Create_Ok_ru'
        ];

        $this
            ->put(route('contents.update', Content::whereTitle($content->title)->first()->id), $data)
            ->assertStatus(302)
            ->assertRedirect('admin/contents')
            ->assertSessionHas('message', 'contents update successful');

        $this->assertDatabaseHas('contents', array(
            'id' => Content::whereTitle($content->title)->first()->id,
            'title' => $content->title,
            'content' => $this->castToJson('{"text": {"de": null, "en": "Create_Ok_en", "es": null, "ru": "Create_Ok_ru", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')

        ));
    }

    /** @test
     * @throws \Exception
     */
    public function delete_content(): void
    {
        $content = factory(Content::class)->make();
        $response = $this->post('admin/contents',[
            'title' => $content->title,
            'text:en' => 'Create_Ok_en',
            'text:ru' => 'Create_Ok_ru'
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/contents')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('contents', [
            'id' => Content::whereTitle($content->title)->first()->id,
            'title' => $content->title,
            'content' => $this->castToJson('{"text": {"de": null, "en": "Create_Ok_en", "es": null, "ru": "Create_Ok_ru", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')
        ]);

        $this
            ->delete(route('contents.destroy', Content::whereTitle($content->title)->first()->id))
            ->assertStatus(302)
            ->assertRedirect('admin/contents')
            ->assertSessionHas('message', 'content delete successful');

        $this->assertDatabaseMissing('contents', [
            'title' => $content->title,
            'content' => $this->castToJson('{"text": {"de": null, "en": "Create_Ok_en", "es": null, "ru": "Create_Ok_ru", "ua": null}, "headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}, "sub_headline": {"de": null, "en": null, "es": null, "ru": null, "ua": null}}')
        ]);
    }

}
