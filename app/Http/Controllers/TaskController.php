<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos todas las tareas
        $tasks = Task::all();
        // Obtenemos el nombre del usuario logeado
        $user = Auth::user()->name;

        // Pasamos las categorías a la vista 'categories.index'
        return view('tasks.index', compact('tasks', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:255"
        ]);

        // Agregar el user_id del usuario autenticado
        $validateData['user_id'] = auth()->user()->id;
        Task::create($validateData);
        return redirect()->route("tasks.index")->with('success', 'Tarea creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tasks = Task::find($id);
        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $task = Task::findOrFail($id);
        $task->update(
            [
                "title" => $request->title,
                "description" => $request->description
            ]
        );

        return redirect()->route("tasks.index")->with('success', 'Task actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route("tasks.index")->with('success', 'Task eliminada con exito.');
    }
}
