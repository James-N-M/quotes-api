<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Tag;
use App\Quote;

class TagQuotesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_view_a_tags_quotes()
    {
        $this->withoutExceptionHandling();

        $quote = factory(Quote::class)->create();

        $tag = factory(Tag::class)->create();

        $tag->quotes()->attach($quote->id);

        $this->get("/api/tags/$tag->id/quotes")
            ->assertStatus(200);
    }
}
