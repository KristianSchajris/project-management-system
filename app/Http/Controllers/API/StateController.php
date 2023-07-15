<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\State\StateRepository;

class StateController extends Controller
{
    protected $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = $this->stateRepository->getAll();

        return response()->json($states);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $state = $this->stateRepository->getById($id);
        
        return response()->json($state);
    }
}
