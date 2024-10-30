<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\CreateRequest;
use App\Http\Resources\TaskResourse;
use App\Service\TaskService as ServiceTaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TaskService;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(ServiceTaskService $taskService){
        $this-> taskService = $taskService;
    }
    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }
    public function store(CreateRequest $createRequest): JsonResponse|TaskResourse
    {
        $request = $createRequest ->validate();
        $result = $this->taskService->create(params: $request);

        if($result) {
            return new TaskResourse(resource: $result);
        }

        return response()->json(data: [
            'message' => 'error'
        ]);
    }
    public function show(Task $task): TaskResourse
    {
        return new TaskResourse($task);
    }
}
