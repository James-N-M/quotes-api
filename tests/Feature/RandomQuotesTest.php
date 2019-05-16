<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Quote;

class RandomQuotesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_get_a_random_quote()
    {
        $quotes = factory(Quote::class, 10)->create();

        $this->get('/api/random-quote');

        $this->assertNotEmpty($quotes);
    }
}
