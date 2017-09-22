<?php

namespace App\Http\Controllers;

use App\ItemChecker;
use App\User;
use Illuminate\Http\Request;

class ItemCheckersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=ItemChecker::all();
        return view("itemcheckers.index",['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=new ItemChecker();
        return view("itemcheckers.create",['item'=>$item]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemChecker  $itemCheckers
     * @return \Illuminate\Http\Response
     */
    public function show(ItemChecker $itemChecker)
    {
        return view("itemcheckers.show",["item"=>$itemChecker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemChecker  $itemCheckers
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemChecker $itemCheckers)
    {
        return view("itemcheckers.edit",['item'=>$itemChecker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemChecker  $itemCheckers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemChecker $itemCheckers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemChecker  $itemCheckers
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemChecker $itemCheckers)
    {
        $itemChecker->delete();
        return \redirect()->route("itemcheckers.index",["notice"=>"item #{$itemChecker->id} Deleted"]);
    }
}
