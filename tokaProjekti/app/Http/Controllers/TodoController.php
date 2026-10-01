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
        //
        $todos = Todo::all();

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nimi' => 'required|string|max:10',
            'kuvaus' => 'nullable',
            'status' => 'required',
            'määräpäivä' => 'nullable|date',
            'kiireellisyys' => 'required',
        ]);

        Todo::create($request->all());
        return redirect()->route('todo.index')->with('success','Lisäys onnistui');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $request->validate([
            'nimi' => 'required'
        ]);

        $todo->update($request->all());

        return redirect()->route('todo.index')->with('success','Päivitys onnistui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return redirect()->route('todo.index')->with('success','Poisto onnistui');
    }
}
