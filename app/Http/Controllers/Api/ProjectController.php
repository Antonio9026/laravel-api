<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // recupero dati dal database con la funzione paginate divido il mio array in pagine, tra parentesi indico il numero di progetti da visualizzare in view per ogni pagina
        $projects = Project::with(["type","technologies"])->paginate(3);

        return response()->json([
            "message" => "Lista progetti",
            "results" => $projects
        ]);
    }
}
