<?php

namespace Feberr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Users extends Model {

  public static function getvendorData() {
    $value=DB::table('users')->where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get();
    return $value;
  }

  public function item(){
      return $this->hasMany(Items::class, 'user_id','id');
  }




}
