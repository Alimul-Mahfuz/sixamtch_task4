<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatusEnum;
use App\Models\User;
use App\Service\TaskService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class TaskController extends Controller
{
    function __construct(
        protected TaskService $taskService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->getTaskList();
        return view('modules.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authUser = auth()->user();

        $userList = User::query()
            ->whereNot('id', $authUser->id)
            ->where('is_admin', false)
            ->select('id', 'name')->get();

        return view('modules.tasks.create', compact('userList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => ['required', new Enum(TaskStatusEnum::class)],
            'deadline' => 'required',
            'assigned_to_id' => 'nullable|exists:users,id',
        ]);

        try {
            $this->taskService->create($validated);
            return redirect()->route('task.index')->with('success', 'Task created successfully, you will received an email soon!');

        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task=$this->taskService->getTaskById($id);
        return view('modules.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
