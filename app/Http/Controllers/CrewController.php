<?php

namespace App\Http\Controllers;

use App\Models\HttpCode;
use App\Services\CrewService;
use Exception;
use Illuminate\Http\Request;

class CrewController extends Controller
{

    protected $crewService;

    public function __construct(CrewService $crewService)
    {
        $this->crewService = $crewService;
    }

    public function index(Request $request)
    {
        try {
            $crews = $this->crewService->getCrewListPaginated($request);
            return response()->json($crews, HttpCode::SUCCESS_OK);

        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), HttpCode::SERVICE_UNAVAILABLE);

        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }
}
