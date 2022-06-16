<?php

namespace Feberr\Models;

use Feberr\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;

    protected $table ="item_order";

    public function order(){
        return $this->hasMany(Order::class,'order_ids','ord_id');
    }
    public function item(){
        return $this->belongsTo(Items::class,'item_id','item_id');
    }

    public function buyer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ownerShip(){
        return $this->belongsTo(User::class,'item_user_id','id');
    }
}
