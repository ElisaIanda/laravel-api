<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

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

    public function store(ProjectStoreRequest $request){
        $data = $request->validated();

        // Questo fa il new project, il fill e il save tutto insieme
        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->id);
    }

    
    public function edit($id){
        $project = Project::findOrFail($id);

        return view("admin.projects.edit", ["project" => $project]);
    }

    public function update(ProjectStoreRequest $request, $id){
        Log::debug($id);
        $project = Project::findOrFail($id);
        Log::debug(var_export($project, true));
        $data = $request->validate();  

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id);
    }

    public function destroy($id){
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
