<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        return response()->json(['message' => 'To does has listed!', "data" => $todos], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($request->all());

        return response()->json(['message' => 'To do has created!', "data" => $todo], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if (!$todo) {
            return response()->json(['message' => 'To do not found'], 404);
        }

        return response()->json(['message' => 'To do has showed!', "data" => $todo], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        if (!$todo) {
            return response()->json(['message' => 'To do not found'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $todo->update($request::all());

        return response()->json(['message' => 'To do has updated!', "data" => $todo], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if (!$todo) {
            return response()->json(['message' => 'To do not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'To do has deleted!']);
    }

    public function user(int $id)
    {
        $todo = Todo::find($id);

        if (!$todo)
            return response()->json(['message' => 'To do not found'], 404);

        $todo->user;

        return response()->json(['message' => 'To do with user has found!', "data" => $todo], 201);
    }
}
