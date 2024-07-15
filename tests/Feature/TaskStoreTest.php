<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a test task.',
            'status' => 'pending',
            'due_date' => now()->addDays(7)->format('Y-m-d'),
        ];
    
        $response = $this->postJson('/api/tasks', $taskData);
    
        $response->assertStatus(201)
                 ->assertJson($taskData);
    
        $this->assertDatabaseHas('tasks', $taskData);
    }
}
