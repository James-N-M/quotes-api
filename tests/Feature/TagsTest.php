<?php

namespace Tests\Feature;

use App\Quote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Tag;

class TagsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_user_can_view_a_tag()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tag = factory(Tag::class)->create();

        $this->get("/api/tags/$tag->id")->assertSuccessful()
        ->assertSee("$tag->name");
    }

    public function test_a_user_can_create_a_tag()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $attributes = [
            'name' => $this->faker->name,
        ];

        $this->post('/api/tags', $attributes);

        $this->assertDatabaseHas('tags', $attributes);
    }

    public function test_a_user_can_delete_a_tag()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tag = factory(Tag::class)->create();

        $this->get("/api/tags/$tag->id")->assertSuccessful()
            ->assertSee("$tag->name");

        $this->delete("/api/tags/$tag->id")->assertSuccessful();
        $this->assertDatabaseMissing("tags", ["id" => $tag->id]);
    }

    public function test_a_quote_can_have_a_tag()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tag = factory(Tag::class)->create();

        $quote = factory(Quote::class)->create();

        $quote->tags()->attach($tag->id);

        $this->assertDatabaseHas('quote_tag', ['quote_id' => $quote->id, 'tag_id' => $tag->id]);
    }

    public function test_a_quote_can_have_multiple_tags()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tag = factory(Tag::class)->create();
        $tagTwo = factory(Tag::class)->create();

        $quote = factory(Quote::class)->create();

        $quote->tags()->attach([
            1 => ['tag_id' => $tag->id],
            2 => ['tag_id' => $tagTwo->id]
        ]);

        $this->assertDatabaseHas('quote_tag', ['quote_id' => $quote->id, 'tag_id' => $tag->id]);
        $this->assertDatabaseHas('quote_tag', ['quote_id' => $quote->id, 'tag_id' => $tagTwo->id]);
    }

    public function test_search_a_tag_by_name()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tag = factory(Tag::class)->create(['name' => "Flower"]);

        $this->get("/api/tags-search?name=$tag->name",
            ['Accept: application/json'])
        ->assertSuccessful();

    }
}
