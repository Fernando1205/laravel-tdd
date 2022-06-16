<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    public function index(): JsonResponse
    {
        $lists = TodoList::all();
        return response()->json($lists);
    }

    public function show(TodoList $list): JsonResponse
    {
        return response()->json($list);
    }
}
