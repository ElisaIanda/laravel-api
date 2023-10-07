<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects=Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    public function show($id){
        $project = Project::findOrFail($id);

        return view("admin.projects.show", compact("project"));
    }

    public function create(){
        return view("admin.projects.create");
    }

    public function store(Request $request){
        $data = $request->validate([
            "title"=>"required|string|max:255",
            "link"=>"required|string",
            "description"=>"required|string",
            "image"=>"required|string|max:255",
            "date"=>"required|date",
        ]);


        // Questo fa il new project, il fill e il save tutto insieme
        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->id);
    }
}
