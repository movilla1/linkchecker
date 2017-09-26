<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        foreach($projects as $project)
            $project->user = User::where('id', '=', $project->user_id)->first();
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
        return view("projects.show",["project"=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("projects.edit",["project"=>$project]);
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
        $project->delete();
        return \redirect()->route("Projects@index",["notice"=>"Project deleted"]);
    }
}
