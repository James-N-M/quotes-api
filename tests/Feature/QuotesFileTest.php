<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuotesFileTest extends TestCase
{
    public function test_a_user_can_download_a_quote_as_text()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'author' => 'Random Author',
            'quote' => 'Downloading things from the internet is silly',
        ];

        $this->get('quotes-download', $attributes)->assertStatus(200);
    }
}
