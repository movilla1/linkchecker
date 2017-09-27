<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function get_user_name() {
        $user = User::find($this->user_id);
        return $user->name;    
    }

    public static function get_all_for_select() {
        if (\Auth::user()->hasRole("admin")) {
            $projects=Project::all();
        } else {
            $projects=Project::where("user_id","=",\Auth::user()->id)->get();
        }
        $res=[];
        foreach ($projects as $prj) {
            $res[$prj->id]=$prj->title;
        }
        return $res;
    }
}
