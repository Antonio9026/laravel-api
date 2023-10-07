<?php

namespace App\Http\Controllers\Admin;

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
    public function store(Request $request)
    {
        $data = $request->validate([
            "title"=>"required",
            "description"=>"required",
            "image"=>"required",
            "github_link"=>"required",
        ]);

    //    il create fa sia il fill che il save in unico comando
        $project = Project::create($data);

        return redirect()->route("admin.projects.show")

    }
}
