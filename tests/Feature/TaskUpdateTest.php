<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskUpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create();
        $newTaskData = [
            'title' => 'Updated Task Title',
            'description' => 'Description',
            'due_date'  => '2024-12-30',
            'status' => 'completed',
        ];

        $response = $this->putJson('/api/tasks/' . $task->id, $newTaskData);

        // dd($response->getContent());

        $response->assertStatus(200)
                 ->assertJson($newTaskData);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task Title',
            'description' => 'Description',
            'due_date'  => '2024-12-30',
            'status' => 'completed',
        ]);
    }
}
