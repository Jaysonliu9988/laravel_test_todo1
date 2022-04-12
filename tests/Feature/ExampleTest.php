<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_todo_by_id()
    {
        $response = $this->get('/todos/1');

        $response->assertStatus(200)
                ->assertJson([
                'todo' => [
                    'id' => true,
                    'name' => true,
                    'description' => true,
                    'due_date' => true,
                    'is_complete' => true],

            ]);
    }

    public function test_get_list_Todos()
    {
        $response = $this->get('/todos');

        $response->assertStatus(200);
    }

    public function test_post_add_todo()
    {
        $response = $this->postJson('/todos', ['name' => 'Example Todo8', 'description' => 'This is an example Todo', 'due_date' => '04/04/2022', 'is_complete' => 1]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'todo' => [
                    'id' => true,
                    'name' => true,
                    'description' => true,
                    'due_date' => true,
                    'is_complete' => true],

            ]);
    }

    public function test_patch_edit_todo()
    {
        $response = $this->patchJson('/todos/1', ['name' => 'Example Todo8']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'todo' => [
                    'name' => 'Example Todo8',
                ],
            ]);
    }

    public function test_delete_todo()
    {
        $response = $this->patchJson('/todos/44');

        $response
            ->assertStatus(200)
            ->assertJson([
                'todo' => [
                ],
            ]);
    }

}
