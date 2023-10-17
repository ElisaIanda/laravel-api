<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(["technologies", "type",])->paginate(6);

        return response()->json( $projects);
    }

    public function show($id){
        $project = Project::where("id", $id)->with("type", "technologies")->firstOrFail();

        return response()->json($project);
    }
}
