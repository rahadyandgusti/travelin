<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialModel extends Model
{

    protected $table = 'social_logins';

	protected $guarded = ['id'];

	protected $primaryKey = "id";

	// protected $dates = ['deleted_at'];

	public function user()
    {
        return $this->belongsTo('App\Models\UsersModel','user_id','id');
    }
}
