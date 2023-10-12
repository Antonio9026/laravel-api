<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectUpsertRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view("admin.projects.show", compact("project"));
    }
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view("admin.projects.create", [
            "types" => $types,
            "technologies" => $technologies
        ]);
    }
    public function store(ProjectUpsertRequest $request)
    {

        $data = $request->validated();
        // dd($data);

        //    salvo il file in filesystem
        $data["image"] = Storage::put("projects", $data["image"]);

        $projects = Project::create($data);
        if (key_exists("technologies", $data)) {
            // l'attach lo faccio dopo il create perchè ho bisogno dell'id del progetto
            $projects->technologies()->attach($data["technologies"]);
        }
        return redirect()->route("admin.projects.show", $projects->id);
    }


    public function edit($id)
    {

        $projects = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();
        return view("admin.projects.edit", compact("projects", "types", "technologies"));
    }


    public function update(ProjectUpsertRequest $request, $id)
    {

        $projects = Project::findOrFail($id);
        $data = $request->validated();


        // creo condizione in modo che ad ogni update non sono obbligato a caricare una nuova immagine 
        if (isset($data["image"])) {

            // creo condizione se esiste già un immagine, prima di caricare la nuova mi cancella l'immagine salvata in cartella
            if ($projects->image) {
                Storage::delete($projects->image);
            }
            // salvo il file in filesystem 

            $img_path = Storage::put("projects", $data["image"]);

            $data["image"] = $img_path;
        }
        // assegnazione technologies
        $projects->technologies()->sync($data["technologies"]);

        $projects->update($data);

        return redirect()->route("admin.projects.show", $projects->id);
    }


    public function destroy($id)
    {
        $projects = Project::findOrFail($id);
        // creo condizione dove se il progetto ha un immagine, prima cancello l?immagine e poi il progetto
        if ($projects->image) {
            Storage::delete($projects->image);
        }
        $projects->technologies()->detach();
        $projects->delete();

        return redirect()->route("admin.projects.index");
    }
}
