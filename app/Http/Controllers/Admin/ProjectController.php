<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ProjectUpsertRequest; 
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view("admin.projects.create");
    }
    public function store(ProjectUpsertRequest $request)
    {

        $data = $request->validated();
        $projects = Project::create($data);


        return redirect()->route("admin.projects.show",$projects->id);
    }


    public function edit($id){
        
        $projects = Project::findOrFail($id);

        return view("admin.projects.edit", ["projects" => $projects]);
    }
 
    
    public function update(ProjectUpsertRequest $request ,$id){

        $projects = Project::findOrFail($id);
        $data = $request->validated();

       $projects->update($data);

       return redirect()->route("admin.projects.show", $projects->id);
    }

   
    public function destroy($id){
        $projects = Project::findOrFail($id);

        $projects->delete();
        
        return redirect()->route("admin.projects.index");
    }
}


