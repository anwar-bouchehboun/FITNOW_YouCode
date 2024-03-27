<?php

namespace Tests\Feature;

use App\Http\Requests\UserAuthRequest;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\UserAuthController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    public function test_user_registration()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ];
        $response = $this->post("/api/register", $userData);
        $response->assertStatus(200);


        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

    }

    public function test_user_login()
    {

        $loginData = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];
        $response = $this->post("/api/login", $loginData);
        $response->assertStatus(200);




    }

    public function logout()
    {
        auth()->user()->tokens()->delete(); 
        return response()->json(['message' => 'logged out'], 200);
    }
}
