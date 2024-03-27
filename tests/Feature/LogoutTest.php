<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_logout()
{
    $user = User::factory()->create();
    $token = $user->createToken('TestToken')->plainTextToken;

    $response = $this->withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->post("/api/logout");

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'logged out',
        ]);
}

}
