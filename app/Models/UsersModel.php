<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class UsersModel extends Model
class UsersModel extends Authenticatable
{
	use Notifiable;

    protected $table = 'users';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

	public function social()
    {
        return $this->hasMany('App\Models\SocialModel','user_id','id');
    }

	// protected $dates = ['deleted_at'];
}
