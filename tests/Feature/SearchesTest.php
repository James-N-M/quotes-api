<?php

namespace Tests\Feature;

use phpDocumentor\Reflection\DocBlock\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Quote;

class SearchesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_user_can_search_quotes_by_tag()
    {
        $this->withoutExceptionHandling();

        $tag = factory(Tag::class)->create([
            'name' => 'People'
        ]);

        $quotes = factory(Quote::class, 6)->create();

        foreach ($quotes as $quote) {
            $quote->tags()->attach($tag->id);
        }

        // then fuzzy search on tags table
        // if one gets clicked search all quotes with that tag
        // if one isn't clicked in the helper
        // fuzzy find all quotes that have anything
        // with the text search string.... username
        // quote description something
    }
}
