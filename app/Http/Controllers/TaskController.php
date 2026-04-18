<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();                // Вызов модели
                                            // Получение всех строк из таблицы tasks
        return response()->json($tasks);     // Возвращаем результаты в виде json
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([        // проверка входных данных
            'title' => 'required|string',           // возвращение массива данных
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);
        $task = new Task($valid);               // создание объекта
        $task->save();                          // сохранение объекта в БД
        return response()->json($task, 201);      // возвращаем задачу и статус 201 (успех)
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task); // Возвращаем результат
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        $valid = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $task->update($valid);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
