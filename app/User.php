<?php

namespace Feberr;

use Feberr\Models\Items;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'vendor';
    const IS_ACTIVE_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];
    const IS_MANUAL_VENDOR_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];
	public function isAdmin()    {
		return $this->user_type === self::ADMIN_TYPE;
	}



    protected $fillable = [
        'name', 'email', 'password', 'username', 'user_token', 'earnings', 'user_type','provider', 'provider_id', 'verified','exclusive_author_need_approval','exclusive_author'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function item(){
        return $this->hasMany(Items::class,'user_id','id');
    }

    public static function getUserName($user_id){
        $user = User::where('id',$user_id)->first();
       return $user;
    }
}
