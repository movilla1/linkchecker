<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use \Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->hasRole("admin")){
            $projects=Project::all();
        } else {
            $projects= Project::where("user_id","=",\Auth::user()->id)->get();
        }
        foreach($projects as $project) {
            $project->user=User::find($project->user_id)->first();
        }
        return view("projects.index",['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create",["project"=>new Project()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->input('title');
        $project->link = $request->input('link');
        $project->user_id = \Auth::user()->id;
        $ret=$project->save();
        return \redirect()->route("projects.index",["notice"=>"Project stored"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project->user_id == \Auth::user()->id || \Auth::user()->hasRole("admin")) {
           return view("projects.show",["project"=>$project]);
        } else {
            return \redirect()->route("projects.index",["notice"=>"You are not authorized to view the project"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if ($project->user_id == \Auth::user()->id || \Auth::user()->hasRole("admin")) {
            return view("projects.edit",["project"=>$project]);
        } else {
            return \redirect()->route("projects.index",["notice"=>"You are not authorized to edit the project"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if ($project->user_id != Auth::user()->id && !Auth::user()->hasRole("admin")){
            return redirect()->route("projects.index",["notice"=>"You are not authorized to edit the project"]);
        }
        $project->title = $request->input('title');
        $project->link = $request->input('link');
        $ret=$project->save();
        if ($ret)
            return \redirect()->route("projects.index",["notice"=>"Project #{$project->id} Updated properly"]);
        else
            return \redirect()->route("projects.index",["notice"=>"Project #{$project->id}  failed to Update"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->user_id == Auth::user()->id || Auth::user()->hasRole("admin")) {
            $project->delete();
        } else {
            return redirect()->route("projects.index",["notice"=>"You are not authorized to remove the project"]);
        }
        return \redirect()->route("projects.index",["notice"=>"Project deleted"]);
    }
}
