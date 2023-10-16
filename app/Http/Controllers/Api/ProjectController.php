<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // recupero dati dal database
        $projects = Project::all();

        return response()->json([
            "message" => "Lista progetti",
            "results" => $projects
        ]);
    }
}
