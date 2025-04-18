<?php

namespace App\Service;

use App\Mail\NewTaskWelcomeMail;
use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\Mail;

class TaskService
{
    /**
     * @throws Exception
     */
    function create($validatedData)
    {
        $auth_user = auth()->user();
        $data = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'deadline' => $validatedData['deadline'],
            'assigned_to_id' => $validatedData['assigned_to_id'] ?? $auth_user->id,
            'user_id' => $auth_user->id,
        ];

        try {
            $task = Task::query()->create($data);
            Mail::to($auth_user->email)->send(new NewTaskWelcomeMail($task));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    function getTaskList(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $auth_user = auth()->user();
        return Task::query()->where('user_id', $auth_user->id)
            ->orWhere('assigned_to_id', $auth_user->id)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    function getTaskById(int $id): Task
    {
        return Task::query()->findOrFail($id);
    }
}
