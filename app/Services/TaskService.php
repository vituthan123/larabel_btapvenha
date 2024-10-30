<?php
namespace App\Service;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class TaskService {
    protected $model;
    public function __construct(Task $task)
    {
        $this->model = $task;
    }
    public function create($params)
    {
        try{
            return $this->model->create($params);
        } catch (Exception $exception) {
            Log::error(message: $exception);

            return false;
        }
    }
}
