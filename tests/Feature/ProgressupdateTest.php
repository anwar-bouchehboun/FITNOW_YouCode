<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Progress;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgressupdateTest extends TestCase
{

    public function testUpdateProgress()
    {
        $user = User::factory()->create();

        $progress = Progress::factory()->create(['user_id' => $user->id]);

        $newWeight = 72.0;
        $measurements = '120x80';
        $performance = 'Good';

        // requête avec les données de mise à jour
        // actingAs       // Authenticate the user
        $response = $this->actingAs($user)
            ->putJson("/api/progress/{$progress->id}", [
                'weight' => $newWeight,
                'measurements' => $measurements,
                'performance' => $performance,
            ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Progress updated successfully',
            ]);

        $this->assertDatabaseHas('progress', [
            'id' => $progress->id,
            'weight' => $newWeight,
            'measurements' => $measurements,
            'performance' => $performance,
        ]);
    }
}