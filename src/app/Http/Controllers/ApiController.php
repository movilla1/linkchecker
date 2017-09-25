<?php

namespace App\Http\Controllers;

use App\ItemChecker;
use App\User;
use Illuminate\Http\Request;
use App\BackLinkChecker;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_items_json(Request $request)
    {
        $user = \Auth::User()->id;  
        $project_id=$request->input("project_id",0);
        $usr = $request->input("uid",0);
        $items = ItemChecker::where("project_id","=",$project_id)->where("user_id","=",$usr)->get();
        return json_encode($items);
    }

    public function check_item(Request $request) 
    {
        $itemrow = $request->input("row_id",0);
        $item = ItemChecker::find($itemrow);
        $ret=BackLinkChecker::check_back_link($item->website,$item->backlink);
        return json_encode($ret);
    }
}
