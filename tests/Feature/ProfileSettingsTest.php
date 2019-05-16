<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileSettingsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserCanUpdateProfile()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/account')->assertStatus(200);

        $attributes = ['name' => 'Jimmy Johns',
        'email' => 'jimmyjohns@test.com',
        'username' => 'jimmy_boi',
        'personal_site' => 'jimmy.com',
        'location' => 'Amurica',
        'instagram' => 'jimmyboi',
        'twitter' => 'jimmyboi',
        'bio' => 'This is my bio',
        'messaging' => true];

        $this->patch('/api/account', $attributes);

        $this->assertDatabaseHas('users', ['email' => 'jimmyjohns@test.com']);

        $this->get('/account')->assertSee('jimmyjohns@test.com');
    }
}
