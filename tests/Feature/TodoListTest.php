<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_all_todo_list(): void
    {
        // preparation / prepare
        $list = TodoList::factory()->create();

        // action / perform
        $response = $this->getJson(route('todo-list.index'));
        // dd($response->json());

        // assertion / predict
        $this->assertEquals(1, count($response->json()));

    }

    public function test_fetch_single_todo_list(): void
    {
        // preparation / prepare
        $list = TodoList::factory()->create();

        // action / perform
        $response = $this->getJson(route('todo-list.show',$list))
                    ->assertOk();

        // assertion / predict
        $this->assertEquals($response['name'], $list->name);
    }
}
