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
        // Получаем все задачи из базы данных.
        $tasks = Task::all();

        // Возвращаем список задач в формате JSON.
        return response()->json($tasks);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидируем входные данные запроса.
        $valid = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Создаем новую задачу и сохраняем ее в базе данных.
        $task = new Task($valid);
        $task->save();

        // Возвращаем созданную задачу и HTTP-статус 201 Created.
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // Возвращаем найденную задачу в формате JSON.
        return response()->json($task);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Валидация новых данных для обновления задачи.
        $valid = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Обновляем существующую задачу в базе данных.
        $task->update($valid);

        // Возвращаем обновленную задачу в формате JSON.
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Удаляем задачу из базы данных.
        $task->delete();

        // Возвращаем пустой ответ со статусом 204.
        return response()->json(null, 204);
    }
}
