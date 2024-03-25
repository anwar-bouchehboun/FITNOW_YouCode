<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Progress;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgressTest extends TestCase
{

    public function testCreateProgress()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('/api/progress', [
                'weight' => 70.5,
                'measurements' => '120x80',
                'performance' => 'Good',
            ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Progress saved successfully',
            ]);

        // Vérifier que les données ont été enregistrées dans la base de données
        $this->assertDatabaseHas('progress', [
            'user_id' => $user->id,
            'weight' => 70.5,
            'measurements' => '120x80',
            'performance' => 'Good',
            'status' => 'Non terminé', // Assurez-vous que le statut est correctement défini
        ]);
    }

    public function testUpdateProgress()
    {
        $user = User::factory()->create();

        // Créer une progression de test pour l'utilisateur
        $progress = Progress::factory()->create(['user_id' => $user->id]);

        $newWeight = 72.0;
        $measurements = '120x80';
        $performance = 'Good';

        // Simuler une requête avec les données de mise à jour
        $response = $this->actingAs($user)
            ->putJson("/api/progress/{$progress->id}", [
                'weight' => $newWeight,
                'measurements' => $measurements,
                'performance' => $performance,
            ]);

        // Vérifier que la réponse est un succès et le contenu est correct
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Progress updated successfully',
            ]);

        // Vérifier que les données ont été correctement mises à jour dans la base de données
        $this->assertDatabaseHas('progress', [
            'id' => $progress->id,
            'weight' => $newWeight,
            'measurements' => $measurements,
            'performance' => $performance,
            // 'status' => $newStatus, // Vous n'avez pas de nouveau statut dans votre test de mise à jour
        ]);
    }
}