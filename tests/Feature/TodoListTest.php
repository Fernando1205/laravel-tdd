<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    private $list;

    public function setup(): void
    {
        parent::setup();
        $this->list = TodoList::factory()->create();
    }

    public function test_fetch_all_todo_list(): void
    {
        // action / perform
        $response = $this->getJson(route('todo-list.index'));

        // assertion / predict
        $this->assertEquals(1, count($response->json()));

    }

    public function test_fetch_single_todo_list(): void
    {
        // action / perform
        $response = $this->getJson(route('todo-list.show',$this->list))
                    ->assertOk();

        // assertion / predict
        $this->assertEquals($response['name'], $this->list->name);
    }

    public function test_store_new_todo_list()
    {
        // preparation
        $list = TodoList::factory()->make();

        // action
        $response = $this->postJson(route('todo-list.store',['name' => $list->name]))
                    ->assertSuccessful()
                    ->assertCreated()
                    ->json();

        // assertion
        $this->assertEquals('Exito al crear usuario', $response);

        $this->assertDatabaseHas('todo_lists',['name' => $list->name]);
    }
}
