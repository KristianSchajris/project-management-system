<?php

namespace App\Repositories\State;

use App\Repositories\State\StateRepositoryInterface;

use App\Models\State;

Class StateRepository implements StateRepositoryInterface
{
    public function getAll()
    {
        return State::all();
    }

    public function getById($id)
    {
        return State::findOrFail($id);
    }
}
