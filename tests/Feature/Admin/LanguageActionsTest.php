<?php

namespace Tests\Feature\Admin;

use App\Models\Language;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageActionsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test
     * @throws \Exception
     */
    public function add_language(): void
    {
        $language = factory(Language::class)->make();
        $response = $this->post('admin/languages',[
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/languages')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('languages', [
            'id' => Language::whereCode($language->code)->first()->id,
            'is_active' => 0,
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function error_add_language(): void
    {
        factory(Language::class)->make();
        $response = $this->post('admin/languages',[
            'flag_country' => null,
            'code' => null,
            'iso' => null,
            'file' => null,
            'name' => null,
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'flag_country',
                'code',
                'iso',
                'file',
                'name',
            ]);

        $this->assertDatabaseMissing('languages', [
            'flag_country' => null,
            'code' => null,
            'iso' => null,
            'file' => null,
            'name' => null,
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function edit_language(): void
    {
        $language = factory(Language::class)->make();
        $response = $this->post('admin/languages',[
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/languages')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('languages', [
            'is_active' => 0,
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);

        $data = [
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ];

        $this
            ->put(route('languages.update', Language::whereCode($language->code)->first()->id), $data)
            ->assertStatus(302)
            ->assertRedirect('admin/languages')
            ->assertSessionHas('message', 'languages update successful');

        $this->assertDatabaseHas('languages', array(
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ));
    }

    /** @test
     * @throws \Exception
     */
    public function delete_language(): void
    {
        $language = factory(Language::class)->make();
        $response = $this->post('admin/languages',[
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/languages')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('languages', [
            'is_active' => 0,
            'flag_country' => $language->flag_country,
            'code' => $language->code,
            'iso' => $language->iso,
            'file' => $language->file,
            'name' => $language->name,
        ]);

        $this
            ->delete(route('languages.destroy', Language::whereCode($language->code)->first()->id))
            ->assertStatus(302)
            ->assertRedirect('admin/languages')
            ->assertSessionHas('message', 'language delete successful');

        $this->assertDatabaseMissing('languages', [
            'flag_country' => null,
            'code' => null,
            'iso' => null,
            'file' => null,
            'name' => null,
        ]);
    }

}
