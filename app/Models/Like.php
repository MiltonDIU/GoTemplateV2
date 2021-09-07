<?php

namespace Feberr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $primaryKey ="like_id";
    protected $table ="items_likes";
    protected $fillable = ['item_id','user_id'];
}
