<?php

namespace App\Repositories\Task;

use App\Repositories\Task\TaskRepositoryInterface;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll()
    {
        return Task::all();
    }

    public function getById($id)
    {
        return Task::findOrFail($id);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->getById($id);
        $task->update($data);

        return $task;
    }

    public function delete($id)
    {
        $task = $this->getById($id);

        $task->delete();
    }
}