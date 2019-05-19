<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp;
use App\Quote;
use App\Tag;

class QuotesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

//    public function test_a_user_can_save_a_random_quote()
//    {
//        $this->withoutExceptionHandling();
//
//        $client = new GuzzleHttp\Client();
//
//        $this->signIn();
//
//        $response = $client->request('GET',
//            'https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en');
//
//        $response = json_decode($response->getBody());
//
//        $attributes = [
//            'author' => $response->quoteAuthor,
//            'quote' => $response->quoteText,
//            'user_id' => auth()->id(),
//        ];
//
//        $this->post('quotes', $attributes);
//
//        $this->assertDatabaseHas('quotes', $attributes);
//    }

    public function test_a_user_can_like_a_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $quote = factory(Quote::class)->create();
        $attributes = [
            'quote_id' => $quote->id,
            'user_id' => auth()->id(),
        ];

        $this->post('/api/likes', $attributes);

        $this->assertDatabaseHas('likes', $attributes);
    }

    public function test_a_user_can_create_a_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $attributes = [
            'author' => $this->faker->name,
            'quote' => $this->faker->sentence,
            'user_id' => auth()->id(),
        ];

        $this->get('/quotes/create')->assertStatus(200);

        $this->post('/api/quotes', $attributes);

        $this->assertDatabaseHas('quotes', $attributes);
    }

    public function test_a_user_can_update_a_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $attributes = ['name' => 'Jimmy Johns',
            'author' => 'jimmyjohns@test.com',
            'quote' => 'fast fresh subs ? or what ever it is this business does',
            'visible' => 'false'
        ];

        $quote = factory(Quote::class)->create(['user_id' => auth()->id()]);

        $this->patch("/api/quotes/$quote->id", $attributes);

        $this->assertDatabaseHas('quotes', ['author' => 'jimmyjohns@test.com']);
    }

    public function test_a_user_can_delete_their_quote()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $quote = factory(Quote::class)->create(['user_id' => auth()->id()]);

        $this->delete("/api/quotes/$quote->id");

        $this->assertDatabaseMissing('quotes', ['id' => $quote->id]);
    }

    public function test_a_guest_can_view_quotes()
    {
        $this->withoutExceptionHandling();

        $quote = factory(Quote::class)->create();

        $this->get('/api/quotes')
            ->assertStatus(200)
            ->assertSee($quote->quote);
    }

    public function test_a_user_can_view_a_quote()
    {
        $this->withoutExceptionHandling();

        $quote = factory(Quote::class)->create();

        $this->get("/api/quotes/$quote->id")
            ->assertStatus(200);
    }

    public function test_a_quote_belongs_to_a_user()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $quote = factory(Quote::class)->create(['user_id' => auth()->id()]);

        $this->assertEquals(auth()->id(), $quote->user->id);
    }



}
