<?php

namespace App\Repositories\Project;

use App\Repositories\Project\ProjectRepositoryInterface;

use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll()
    {
        return Project::all();
    }

    public function getById($id)
    {
        return Project::findOrFail($id);
    }

    public function create(array $data)
    {
        return Project::create($data);
    }

    public function update($id, array $data)
    {
        $project = $this->getById($id);
        $project->update($data);

        return $project;
    }

    public function delete($id)
    {
        $project = $this->getById($id);

        $project->delete();
    }
}
