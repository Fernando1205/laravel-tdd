<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): JsonResponse
    {
        TodoList::create($request->all());
        return response()->json('Exito al crear usuario',201);
    }
}
