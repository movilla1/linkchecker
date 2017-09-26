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
        $project_id = Req::input("project_id");
        return view("items.create",['item'=>$item, "project_id"=>$project_id]);
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
        $item->user_id =  Auth::user()->id;
        $ret=$item->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemChecker $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function show(ItemChecker $itemChecker)
    {
        $project = Project::find($itemChecker->project_id);
        return view("items.show",["item"=>$itemChecker, "project"=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemChecker $itemChecker)
    {
        return view("items.edit",['item'=>$itemChecker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemChecker $itemChecker)
    {
        $itemChecker->backlink = $request->input('backlink');
        $itemChecker->website = $request->input('website');
        $itemChecker->project_id = $request->input('project_id');
        $itemChecker->user_id =  \Auth::user()->id;
        $ret=$itemChecker->save();
        return \redirect()->route("items.index",["notice"=>"Item ##{$itemChecker->id} Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemChecker  $itemChecker
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemChecker $itemChecker)
    {
        $itemChecker->delete();
        return \redirect()->route("items.index",["notice"=>"item #{$itemChecker->id} Deleted"]);
    }
}
