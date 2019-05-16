<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Quote;
use App\Tag;

class QuoteTagsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_guest_can_view_a_quotes_tags()
    {
        $this->withoutExceptionHandling();

        $quote = factory(Quote::class)->create();

        $tag = factory(Tag::class)->create();

        $quote->tags()->attach($tag->id);

        $this->get("/api/quotes/$quote->id/tags")
            ->assertStatus(200);
    }

    public function test_a_user_can_add_a_tag_to_a_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $quote = factory(Quote::class)->create();

        $tag = factory(Tag::class)->create();

        $attributes = [
            'quote_id' => $quote->id,
            'tag_id' => $tag->id,
        ];

        $this->post("/api/quotes/$quote->id/tags/$tag->id", $attributes);
        $this->assertDatabaseHas('quote_tag', $attributes);
    }

    public function test_a_user_can_remove_a_tag_from_a_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $quote = factory(Quote::class)->create();

        $tag = factory(Tag::class)->create();

        $attributes = [
            'quote_id' => $quote->id,
            'tag_id' => $tag->id,
        ];

        $this->post("/api/quotes/$quote->id/tags/$tag->id", $attributes)->assertSuccessful();
        $this->delete("/api/quotes/$quote->id/tags/$tag->id", $attributes)->assertSuccessful();
        $this->assertDatabaseMissing('quote_tag', $attributes);
    }
}
