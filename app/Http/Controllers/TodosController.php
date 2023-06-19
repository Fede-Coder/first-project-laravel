<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::orderBy('id')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $date = $request->validated();
        $todo = Todo::create($date);
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $date = $request->validated();
        $todo->update($date);
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
