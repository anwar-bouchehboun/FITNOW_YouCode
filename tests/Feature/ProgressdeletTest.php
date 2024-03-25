<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Progress;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgressdeletTest extends TestCase
{
    public function testDeleteProgress()
    {
        $user = User::factory()->create();
        $progress = Progress::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->deleteJson("/api/progress/{$progress->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Progress deleted successfully',
            ]);

        $this->assertDatabaseMissing('progress', ['id' => $progress->id]);
    }

}