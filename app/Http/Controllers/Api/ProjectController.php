<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // recupero dati dal database con la funzione paginate divido la lista dei prodotti in pagine, tra parentesi indico il numero di progetti da visualizzare in view per ogni pagina, la funzione with mi da la possibilità di recuperare il contenuto delle relazioni del db progetti
        $projects = Project::with(["type","technologies"])->paginate(3);

        return response()->json([
            "message" => "Lista progetti",
            "results" => $projects
        ]);
    }

    public function show($id){
        $project = Project::where("id", $id)->with("type","technologies")->first();

        return response()->json($project);
    }
}
