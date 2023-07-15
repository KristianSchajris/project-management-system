<?php

namespace App\Repositories\State;

interface StateRepositoryInterface
{
    public function getAll();

    public function getById($id);

}
