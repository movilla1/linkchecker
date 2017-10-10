<?php

namespace App\Http\Controllers;

use App\ItemChecker;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Req;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::User()->id;        
        $projects = Project::where("user_id","=",$user)->get();
        return view("items.index",["projects"=>json_encode($projects)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=new ItemChecker();
        $project_id = Req::input("project_id",false);
        if ($project_id) {
            $project = Project::find($project_id);
        } else {
            $project=false;
        }
        $projects = Project::get_all_for_select();
        return view("items.create",['item'=>$item, "project"=>$project, "projects"=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ItemChecker();
        $item->backlink = $request->input('backlink');
        $item->website = $request->input('website');
        $item->project_id = $request->input('project_id');
        $item->user_id =  \Auth::user()->id;
        $ret=$item->save();
        return \redirect()->route("items.index",["notice"=>"Item ##{$item->id} stored"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemChecker $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        $project = Project::find($project_id);
        $links = ItemChecker::where("project_id","=",$project->id)->where("user_id","=",\Auth::user()->id)->get();
        return view("items.show",["project"=>$project,"links"=>json_encode($links)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemChecker $item)
    {
        $project = Project::find($item->project_id);
        return view("items.edit",['item'=>$item,"project"=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemChecker $item)
    {
        $item->backlink = $request->input('backlink');
        $item->website = $request->input('website');
        $item->project_id = $request->input('project_id');
        $item->user_id =  \Auth::user()->id;
        $ret=$item->save();
        return \redirect()->route("items.index",["notice"=>"Item ##{$item->id} Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemChecker $item)
    {
        $item->delete();
        return \redirect()->route("items.index",["notice"=>"item #{$item->id} Deleted"]);
    }
}
