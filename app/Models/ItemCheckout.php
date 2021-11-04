<?php

namespace Feberr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Feberr\User;
class ItemCheckout extends Model
{
    use HasFactory;

    protected $table ="item_checkout";

    public function buyer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ownerShip(){
        return $this->belongsTo(User::class,'item_user_id','id');
    }
    public function itemOrder(){
        return $this->hasMany(ItemOrder::class,'purchase_token','purchase_token');
    }
}
