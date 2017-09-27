<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function get_user_name() {
        $user = User::find($this->user_id);
        return $user->name;    
    }
}
